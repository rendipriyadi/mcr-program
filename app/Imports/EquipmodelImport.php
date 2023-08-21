<?php

namespace App\Imports;

use App\Models\EquipmentModel;
use App\Models\Equipmodel;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class EquipmodelImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new EquipmentModel([
            'sitecode' => $row['sitecode'],
            'codeunit' => $row['codeunit'],
            'modelunit' => $row['modelunit'],
            'typecode' => $row['typecode'],
            'activitycode' => $row['activitycode']
        ]);
    }
}
