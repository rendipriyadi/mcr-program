<?php

namespace App\Exports;

use App\Models\Shift;
use App\Models\ShiftCode;
use Maatwebsite\Excel\Concerns\FromCollection;

class ShiftCodeExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Shift::all();
    }
}
