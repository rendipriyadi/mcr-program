<?php

namespace App\Exports;

use App\Models\Payload;
use Maatwebsite\Excel\Concerns\FromCollection;

class PayloadExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Payload::all();
    }
}
