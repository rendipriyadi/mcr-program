<?php

namespace App\Imports;

use App\Models\StatusUnit;
use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\SkipsEmptyRows;
use Maatwebsite\Excel\Concerns\SkipsErrors;
use Maatwebsite\Excel\Concerns\SkipsOnError;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithValidation;

class StatusUnitImport implements ToModel, WithHeadingRow, SkipsEmptyRows, WithValidation, SkipsOnError
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    use Importable, SkipsErrors;

    public function model(array $row)
    {
        return new StatusUnit([
            'sitecode' => $row ['sitecode'],
            'statusunitdate' => $row ['statusunitdate'],
            'statusopt' => $row ['statusopt'],
            'statusnikopt' => $row ['statusnikopt'],
            'statuscnunit' => $row ['statuscnunit'],
            'statusmodel' => $row ['statusmodel'],
            'statusitemcat' => $row ['statusitemcat'],
            'statuscategory' => $row['statuscategory'],
            'statusstart' => $row['statusstart'],
            'statusend' =>$row['statusend'],
            'statushour' => $row['statushour'],
            'dedicated' => $row['dedicated'],
            'statusremark' =>$row ['statusremark'],
            'statusshift' => $row ['statusshift'],
            'statuscode' => $row ['statuscode']
        ]);
    }
    public function rules(): array
    {
        return [
            'sitecode' => 'required',
            '*.sitecode' => 'required',

            'statusunitdate' => 'required',
            '*.statusunitdate' => 'required',

            'statusopt' => 'required',
            '*.statusopt' => 'required',

            'statusnikopt' => 'required|numeric|max:15',
            '*.statusnikopt' => 'required',

            'statuscnunit' => 'required',
            '*.statuscnunit' => 'required',

            'statusmodel' => 'required',
            '*.statusmodel' => 'required',

            'statusitecat' => 'required',
            '*.statusitecat' => 'required',

            'statuscategory' => 'required',
            '*.statuscategory' => 'required',

            'statusstart' => 'required',
            '*.statusstart' => 'required',

            'statusend' => 'required',
            '*.statusend' => 'required',

            'statushour' => 'required',
            '*.statushour' => 'required',

            'dedicated' => 'required',
            '*.dedicated' => 'required',

            'statusremark' => 'required',
            '*.statusremark' => 'required',

            'statusshift' => 'required',
            '*.statusshift' => 'required',

            'statuscode' => 'required',
            '*.statuscode' => 'required',
        ];

}
}
