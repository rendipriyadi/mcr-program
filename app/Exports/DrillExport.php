<?php

namespace App\Exports;

use App\Models\Drill;
use Maatwebsite\Excel\Concerns\FromCollection;

class DrillExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Drill::all();
    }
}
