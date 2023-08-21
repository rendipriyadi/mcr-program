<?php

namespace App\Imports;

use App\Models\Time;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class TimeImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Time([
            'categori' => $row ['categori'],
            'time' => $row ['time'],
            'jam' => $row ['jam'],
            'shift' => $row ['shift'],
            'calculation' => $row ['calculation'],
            'number' => $row ['number']
        ]);
    }
}
