<?php

namespace App\Services;

use App\Models\Apointment;
use App\Models\Patient;
use App\Models\User;
use Illuminate\Support\Facades\Config;
use Illuminate\Validation\ValidationException;

class ImportService
{
    /**
     * @throws ValidationException
     */
    public function importData(): void
    {
        $filePaths = [
            'appointments' => storage_path('app/csv_files/apointments.csv'),
            'patients' => storage_path('app/csv_files/patients.csv'),
            'users' => storage_path('app/csv_files/users.csv'),
        ];

        $expectedHeaders = [
            'appointments' => Config::get('csv-header.expected_headers.appointments'),
            'patients' => Config::get('csv-header.expected_headers.patients'),
            'users' => Config::get('csv-header.expected_headers.users'),
        ];

        foreach ($filePaths as $type => $filePath) {
            $this->validateCsvFile($filePath);
            $this->validateHeaders($filePath, $expectedHeaders[$type]);
            $this->importCsvData($filePath, $this->getModel($type));
        }
    }

    private function getModel($type)
    {
        $models = [
            'appointments' => Apointment::class,
            'patients' => Patient::class,
            'users' => User::class,
        ];

        return $models[$type];
    }

    private function validateHeaders($csvFilePath, $expectedHeaders): void
    {
        $file = fopen($csvFilePath, 'r');
        $headers = fgetcsv($file);
        fclose($file);

        if ($headers !== $expectedHeaders) {
            throw ValidationException::withMessages([
                'csv_headers' => 'Invalid headers detected in one or more CSV files.',
            ]);
        }
    }

    private function validateCsvFile($csvFilePath): void
    {
        if (!file_exists($csvFilePath) || !is_file($csvFilePath) || pathinfo($csvFilePath, PATHINFO_EXTENSION) !== 'csv') {
            throw ValidationException::withMessages([
                'csv_files' => 'One or more files are missing or not in CSV format.',
            ]);
        }
    }

    private function importCsvData($csvFilePath, $model): void
    {
        $data = array_map('str_getcsv', file($csvFilePath));
        $header = array_shift($data);

        $importedData = [];
        foreach ($data as $row) {
            $importedData[] = array_combine($header, $row);
        }

        $chunks = array_chunk($importedData, 1000); // Adjust chunk size as needed
        foreach ($chunks as $chunk) {
            foreach ($chunk as $item) {
                dd($item);
                try {
                    $model::validate($item);
                } catch (ValidationException $exception) {
                    echo 'Validation failed: ' . $exception->getMessage();
                    return;
                }
            }

            $model::insert($chunk);
        }
    }
}
