<?php

namespace App\Exports;

use App\Models\Operator;

use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class OperatorExport implements FromView
{
    /**
     * @return \Illuminate\Support\Collection
     */
  
  

    public function view(): View
    {
        return view('operator.export', [
            'operator' => Operator::all(),
        ]);
    }
}