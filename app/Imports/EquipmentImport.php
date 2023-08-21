<?php

namespace App\Imports;

use App\Models\Equipment;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class EquipmentImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Equipment([
            'category' => $row['category'],
            'type' => $row['type'],
            'modelunit' => $row ['modelunit'],
            'codeunit' => $row ['codeunit'],
            'codemodel' => $row ['codemodel'],
            'equipactivity' => $row ['equipactivity'],
            'sitecode' => $row ['sitecode']

        ]);
    }
}
