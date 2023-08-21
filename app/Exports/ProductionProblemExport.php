<?php

namespace App\Exports;

use App\Models\Problem;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromView;

class ProductionProblemExport implements FromView
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function view(): View
    {
        return view('setup.problem.export', [
            'problem' => Problem::all(),
        ]);
    }
    
}
