<?php

namespace App\Imports;

use App\Models\Material;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class MaterialImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Material([
           'material' => $row['material'],
           'submaterial' => $row ['submaterial'],
           'factor' => $row ['factor'],
           'sitecode' => $row ['sitecode']
        ]);
    }
}
