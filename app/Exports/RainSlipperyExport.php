<?php

namespace App\Exports;

use App\Models\SlipperyRain;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromView;

class RainSlipperyExport implements FromView
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function view(): View
    {  
        return view('rainslippery.export', [
        'rainslippery' => SlipperyRain::all()
    ]);
    }
}
