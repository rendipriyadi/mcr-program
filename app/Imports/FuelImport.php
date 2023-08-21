<?php

namespace App\Imports;

use App\Models\Fuel;
use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\SkipsEmptyRows;
use Maatwebsite\Excel\Concerns\SkipsErrors;
use Maatwebsite\Excel\Concerns\SkipsOnError;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithValidation;

class FuelImport implements ToModel, WithHeadingRow, WithValidation, SkipsEmptyRows, SkipsOnError
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */

    use Importable, SkipsErrors;

    public function model(array $row)
    {
        return new Fuel([
            'sitecode' => $row['sitecode'],
            'fueldate' => $row['fueldate'],
            'shiftcode' => $row['shiftcode'],
            'typecode' => $row['typecode'],
            'fuelmodel' => $row['fuelmodel'],
            'fuelcnunit' => $row['fuelcnunit'],
            'hmbefore' => $row['hmbefore'],
            'hmstart' => $row['hmstart'],
            'fueltotal' => $row['fueltotal'],
            'fuelusage' => $row['fuelusage'],
            'fuelcons' => $row['fuelcons'],
            'fuelob' => $row['fuelob'],
            'fuelcoal' => $row['fuelcoal'],
            'fuelcoaltransport' => $row['fuelcoaltransport'],
            'dedicated' => $row ['dedicated']
        ]);
    }

    public function rules ():array {
        return [
            'sitecode' => 'required',
            '*.sitecode' => 'required',

            'fueldate' => 'required',
            '*.fueldate' => 'required',

            'shiftcode' => 'required',
            '*.shiftcode' => 'required',

            'typecode' => 'required',
            '*.typecode' => 'required',

            'fuelmodel' => 'required',
            '*.fuelmodel' => 'required',

            'fuelmodel' => 'required',
            '*.fuelmodel' => 'required',

            'fuelcnunit' => 'required',
            '*.fuelcnunit' => 'required',

            'hmbefore' => 'required',
            '*.hmbefore' => 'required',

            'fueltotal' => 'required',
            '*.fueltotal' => 'required',

            'fuelusage' => 'required',
            '*.fuelusage' => 'required',

            'fuelcons' => 'required',
            '*.fuelcons' => 'required',

            'fuelob' => 'required',
            '*.fuelob' => 'required',

            'fuelcoal' => 'required',
            '*.fuelcoal' => 'required',

            'fuelcoaltransport' => 'required',
            '*.fuelcoaltransport' => 'required',

            'dedicated' => 'required',
            '*.dedicated' => 'required',


        ];
    }
}
