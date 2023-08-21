<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
//IMPORT PACKAGE LEAGUE/CSV
use League\Csv\Reader;
use App\Models\Ritasi;
use Dotenv\Store\File\Reader as FileReader;
use File;
use Maatwebsite\Excel\Reader as ExcelReader;
use Symfony\Component\CssSelector\Parser\Reader as ParserReader;

class ImportJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;
    protected $filename;
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($filename)
    {
        $this->filename = $filename;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
      // READ DATA DARI FILE CSV YANG DISIMPAN DIDALAM FOLDER
        // STORAGE > APP > PUBLIC > IMPORT > NAMAFILE.CSV
        $csv = ExcelReader::createFromPath(storage_path('app/public/import/' . $this->filename), 'r');
        //BARIS PERTAMA DI-SET SEBAGAI KEY DARI ARRAY YANG DIHASILKAN
        $csv->setHeaderOffset(0);
        
        //LOOPING DATA YANG TELAH DI-LOAD
        foreach ($csv as $row) {
            //SIMPAN KE DALAM TABLE USER
            Ritasi::create([
                'sitecode' => $row ['sitecode'],
                'date' =>  $row ['date'],
                'shift' =>  $row ['shift'],
                'time' =>  $row ['time'],
                'nikloader' => $row  ['nikloader'],
                'oploader' =>  $row ['oploader'],
                'nikhauler' =>  $row ['nikhauler'],
                'ophauler' => $row  ['ophauler'],
                'codeloader' => $row  ['codeloader'],
                'modelloader' => $row  ['modelloader'],
                'codehauler' => $row  ['codeloader'],
                'modelhauler' => $row  ['modelhauler'],
                'block' =>  $row ['block'],
                'pit' =>  $row ['pit'],
                'distance' =>  $row ['distance'],
                'ritase' =>  $row ['ritase'],
                'material' =>  $row ['material'],
                'submaterial' =>  $row ['submaterial'],
               
                'factor' =>  $row ['factor'],
                'detail' =>  $row ['detail'],
                'dumping' => $row  ['dumping'],
            ]);
        }
        //APABILA PROSES TELAH SELESAI, FILE DIHAPUS.
    
    }
    }

