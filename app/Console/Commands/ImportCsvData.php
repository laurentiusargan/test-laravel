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

    public function handle(): void
    {
        $this->importService->importData();
        $this->info('CSV files imported successfully');
    }
}
