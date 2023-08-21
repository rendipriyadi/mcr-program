<?php

namespace App\Imports;

use App\Models\Coal;
use Maatwebsite\Excel\Concerns\ToModel;

class CoalExposeImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Coal([
            //
        ]);
    }
}
