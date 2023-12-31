<?php

namespace App\Exports;

use App\Models\Time;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromView;

class TimeExport implements FromView
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function view(): View
    {
        return view('setup.time.export', [
            'time' => Time::all()
        ]);
    }
}
