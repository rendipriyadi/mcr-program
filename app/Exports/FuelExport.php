<?php

namespace App\Exports;

use App\Models\Fuel;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromView;

class FuelExport implements FromView
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function view(): View
{
    return view('fuel.export', [
        'fuel' => Fuel::all()
    ]);
}
    
}
