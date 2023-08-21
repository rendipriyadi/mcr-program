<?php

namespace App\Exports;

use App\Models\StatusUnit;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromView;

class StatusUnitExport implements FromView
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function view(): View
    {
        return view('statusunit.export', [
            'statusunit' => StatusUnit::all()
        ]);
    }
}
