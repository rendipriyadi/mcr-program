<?php

namespace App\Imports;

use App\Models\DataDrill;
use Maatwebsite\Excel\Concerns\ToModel;

class DrillImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new DataDrill([
            ''
        ]);
    }
}
