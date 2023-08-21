<?php

namespace App\Imports;

use App\Models\Operator;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;


class OperatorImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Operator([
            'optnik' => $row ['optnik'],
            'optnama' => $row ['optnama'],
            'optversati' => $row ['optversati'],

            'optsite' => $row ['optsite'],
            'no_telp' => $row ['no_telp'],
        ]);
    }
}
