<?php

namespace App\Exports;

use App\Models\Ritasi;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromView;

class RitasiExport implements FromView
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function view(): View
    {
        return view('ritasi.export', [
            'ritasi' => Ritasi::all()
        ]);
    }
}
