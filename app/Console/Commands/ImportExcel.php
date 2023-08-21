<?php

namespace App\Console\Commands;

use App\Imports\RitasiImport;
use Illuminate\Console\Command;

class ImportExcel extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'import.excel';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Laravel Excel Importer';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $this->output->title('Starting import');
        (new RitasiImport)->withOutput($this->output)->import('ritasi.xlsx');
        $this->output->success('Import successful');
    }
}
