<?php

namespace App\Exports;

use App\Models\Material;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromView;

class MaterialExport implements FromView
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function view(): View
    {
        return view('setup.material.export', [
            'material' => Material::all(),
        ]);
    }
}
