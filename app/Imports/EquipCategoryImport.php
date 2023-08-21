<?php

namespace App\Imports;

use App\Models\Equipcategori;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class EquipCategoryImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Equipcategori([
            'categori' => $row ['categori'],
            'itemcategory' => $row['itemcategory'],
            'sitecode' => $row['sitecode']
        ]);
    }
}
