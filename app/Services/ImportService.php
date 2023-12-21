<?php

namespace App\Services;

use Exception;

class ImportService
{
    /**
     * @throws Exception
     */
    public function importFile(string $file): void
    {
        $modelClassName = 'App\Models\\' . ucwords(pathinfo($file, PATHINFO_FILENAME), '_');
        $model = substr($modelClassName, 0, -1);

        $filePath = 'storage/app/' . $file;
        if (!file_exists($filePath)) {
            throw new Exception('File not found.');
        }

        $data = array_map('str_getcsv', file($filePath));
        $header = array_shift($data);
        $importedData = [];

        foreach ($data as $row) {
            $importedData[] = array_combine($header, $row);
        }

        $chunks = array_chunk($importedData, 1000); // Adjust chunk size as needed
        foreach ($chunks as $chunk) {
            $model::insert($chunk);
        }
    }
}