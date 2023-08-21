<?php

namespace App\Exports;


use App\Models\Hauler;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromView;

class TruckFactorExport implements FromView
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function view(): View
    {  
        return view('setup.faktor.export', [
        'factor' => Hauler::all()
    ]);
    
}
}