<?php

namespace App\Exports;

use App\Models\Coal;
use Maatwebsite\Excel\Concerns\FromCollection;

class CoalExposeExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Coal::all();
    }
}
