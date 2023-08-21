<?php

namespace App\Exports;

use App\Models\Equipment;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromView;

class EquipmentExport implements FromView
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function view(): View
    {
        return view('equipment.export', [
            'equip' => Equipment::all()
        ]);
    }
}
