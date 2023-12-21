<?php

namespace App\Console\Commands;

use App\Services\ImportService;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Storage;

class ImportCsvData extends Command
{
    protected $signature = 'import:csv';
    protected $description = 'Import CSV data';

    public function __construct(
        private readonly ImportService $importService
    )
    {
        parent::__construct();
    }

    public function handle(): int
    {
        $files = Storage::files('csv_files');
        foreach ($files as $file) {
            if (pathinfo($file, PATHINFO_EXTENSION) === 'csv') {
                $this->importService->importFile($file);
                $this->info('CSV file imported successfully:' . $file);
            }
        }
        return 0;
    }
}
