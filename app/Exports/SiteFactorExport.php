<?php

namespace App\Exports;

use App\Models\SiteFactor;
use Maatwebsite\Excel\Concerns\FromCollection;

class SiteFactorExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return SiteFactor::all();
    }
}
