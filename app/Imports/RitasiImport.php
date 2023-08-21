<?php

namespace App\Imports;

use App\Models\Ritasi;

use Maatwebsite\Excel\Concerns\SkipsEmptyRows;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithValidation;
use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\SkipsOnError;
use Maatwebsite\Excel\Concerns\WithProgressBar;
use Maatwebsite\Excel\Concerns\SkipsErrors;

class RitasiImport implements WithHeadingRow, SkipsEmptyRows,ToModel, WithProgressBar, WithValidation, SkipsOnError
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    use Importable, SkipsErrors;


    public function model(array $row)
    {
        return new Ritasi([
            'sitecode' => $row['sitecode'],
            'date' => $row['date'],
            'shift' => $row['shift'],
            'time' => $row['time'],
            'nikloader' => $row['nikloader'],
            'oploader' => $row['oploader'],
            'nikhauler' => $row['nikhauler'],
            'ophauler' => $row['ophauler'],
            'codeloader' => $row['codeloader'],
            'modelloader' => $row['modelloader'],
            'codehauler' => $row['codehauler'],
            'modelhauler' => $row['modelhauler'],
            'block' => $row['block'],
            'pit' => $row['pit'],
            'distance' => $row['distance'],
            'ritase' => $row['ritase'],
            'material' => $row['material'],
            'submaterial' => $row['submaterial'],
            'produksi' => $row['produksi'],
            'adjustment' => $row['adjustment'],
            'distvol' => $row['distvol'],
            'factor' => $row['factor'],
            'detail' => $row['detail'],
            'dumping' => $row['dumping'],


        ]);
    }

public function rules(): array
    {
        return [
            'sitecode' => 'required',
            '*.sitecode' => 'required',

            'date' => 'required',
            '*.date' => 'required',

            'shift' => 'required',
            '*.shift' => 'required',

            'time' => 'required',
            '*.time' => 'required',

            'nikloader' => 'required|min:8',
            '*.nikloader' => 'required',

            'oploader' => 'required',
            '*.oploader' => 'required',

            'nikhauler' => 'required|min:8',
            '*.nikhauler' => 'required',

            'ophauler' => 'required',
            '*.ophauler' => 'required',

            'codeloader' => 'required',
            '*.codeloader' => 'required',

            'modelloader' => 'required',
            '*.modelloader' => 'required',

            'codehauler' => 'required',
            '*.codehauler' => 'required',

            'modelhauler' => 'required',
            '*.modelhauler' => 'required',

            'block' => 'required',
            '*.block' => 'required',

            'pit' => 'required',
            '*.pit' => 'required',

            'distance' => 'required',
            '*.distance' => 'required',

            'ritase' => 'required',
            '*.ritase' => 'required',


            'material' => 'required',
            '*.material' => 'required',

            'submaterial' => 'required',
            '*.submaterial' => 'required',

            'produksi' => 'required',
            '*.produksi' => 'required',

            'adjustment' => 'required',
            '*.adjustment' => 'required',

            'distvol' => 'required',
            '*.distvol' => 'required',


            'factor' => 'required',
            '*.factor' => 'required',

            'detail' => 'required',
            '*.detail' => 'required',

            'dumping' => 'required',
            '*.dumping' => 'required',


        ];
    }
//     public function customValidationAttributes()
// {
//     return ['nikloader' => 'NIK Loader'];
// }

}

