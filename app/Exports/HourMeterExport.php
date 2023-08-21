<?php

namespace App\Exports;

use App\Models\MeterHour;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromView;

class HourMeterExport implements FromView
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function view(): View
    {
        
        return view('hourmeter.export', [
            'hourmeter' => MeterHour::all()
        ]);
    }
}
