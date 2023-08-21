<?php

namespace App\Imports;

use App\Models\Problem;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class ProductionProblemImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Problem([
            'prodproblem' => $row ['prodproblem'],
            'sitecode' => $row['sitecode']
        ]);
    }
}
