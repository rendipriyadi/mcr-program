<?php

namespace App\Imports;

use App\Models\Payload;
use Maatwebsite\Excel\Concerns\ToModel;

class PayloadImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Payload([
            //
        ]);
    }
}
