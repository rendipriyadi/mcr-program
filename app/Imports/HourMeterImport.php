<?php

namespace App\Imports;

use App\Models\MeterHour;
use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\SkipsEmptyRows;
use Maatwebsite\Excel\Concerns\SkipsErrors;
use Maatwebsite\Excel\Concerns\SkipsOnError;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithValidation;

class HourMeterImport implements ToModel, SkipsEmptyRows, WithValidation, SkipsOnError
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    use Importable, SkipsErrors;


    public function model(array $row)
    {
        return new MeterHour([
            'sitecode' => $row ['sitecode'],
            'datehm' => $row ['datehm'],
            'shift' => $row ['shift'],
            'nikopthm' => $row ['nikopthm'],
            'opthm' => $row ['opthm'],
            'modelhm' =>$row['modelhm'],
            'cnunithm' => $row['cnunithm'],
            'hmawal'=>$row['hmawal'],
            'hmakhir'=>$row['hmakhir'],
            'totalhm'=>$row['totalhm'],
            'remarkhm'=>$row['remarkhm'],

        ]);
    }

    public function rules(): array
    {
        return [
            'sitecode' => 'required',
            '*.sitecode' => 'required',

            'datehm' => 'required',
            '*.datehm' => 'required',

            'shift' => 'required',
            '*.shift' => 'required',

            'nikopthm' => 'required',
            '*.nikopthm' => 'required',

            'opthm' => 'required',
            '*.opthm' => 'required',

            'modelhm' => 'required',
            '*.modelhm' => 'required',

            'cnunithm' => 'required',
            '*.cnunithm' => 'required',


            'hmawal' => 'required',
            '*.hmawal' => 'required',

            'hmakhir' => 'required',
            '*.hmakhir' => 'required',

            'totalhm' => 'required',
            '*.totalhm' => 'required',

            'remarkhm' => 'required',
            '*.remarkhm' => 'required',


        ];
    }
}
