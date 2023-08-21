<?php

namespace App\Exports;

use App\Models\Equipcategori;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromView;

class EquipCategoryExport implements FromView
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function view(): View
    {
        return view('setup.equipcategori.export', [
            'equipcategori' => Equipcategori::all()
        ]);
    
    }
}
