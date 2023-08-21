<?php

namespace App\Imports;

use App\Models\Hauler;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class TruckFactorImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Hauler([
            'modelhauler' => $row['modelhauler'],
            'factor_truck' => $row['factor_truck'],
            'sitecode' => $row['sitecode']
        ]);
    }
}
