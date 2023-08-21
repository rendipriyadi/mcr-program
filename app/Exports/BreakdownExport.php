<?php

namespace App\Exports;

use App\Models\Breakdown;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromView;

class BreakdownExport implements FromView
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function view(): View
    {
        return view('breakdown.export', [
            'breakdown' => Breakdown::all()
        ]);
    }
    
}
