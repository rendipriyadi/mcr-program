<?php

namespace App\Imports;

use App\Models\SlipperyRain;
use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\SkipsEmptyRows;
use Maatwebsite\Excel\Concerns\SkipsErrors;
use Maatwebsite\Excel\Concerns\SkipsOnError;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithValidation;

class RainSlipperyImport implements ToModel, WithHeadingRow, SkipsEmptyRows, WithValidation, SkipsOnError
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    use Importable, SkipsErrors;


    public function model(array $row)
    {
        return new SlipperyRain([
            'sitecode' => $row ['sitecode'],
            'rainslipdate' => $row ['rainslipdate'],
            'rainslipshift' => $row ['rainslipshift'],
            'rainstart' => $row ['rainstart'],
            'rainend' => $row ['rainend'],
            'rainhour' => $row ['rainhour'],
            'slipperystart' => $row ['slipperystart'],
            'slipperyend' => $row ['slipperyend'],
            'slipperyhour' => $row ['slipperyhour'],
            'rainfall' => $row ['rainfall']
        ]);
    }
    public function rules(): array
    {
        return [
        'sitecode' => 'required',
        '*.sitecode' => 'required',

        'rainslipdate' => 'required',
        '*.rainslipdate' => 'required',

        'rainslipshift' => 'required',
        '*.rainslipshift' => 'required',

        'rainstart' => 'required',
        '*.rainstart' => 'required',

        'rainend' => 'required',
        '*.rainend' => 'required',

        'rainhour' => 'required',
        '*.rainhour' => 'required',

        'slipperystart' => 'required',
        '*.slipperystart' => 'required',

        'slipperyend' => 'required',
        '*.slipperyend' => 'required',

        'slipperyhour' => 'required',
        '*.slipperyhour' => 'required',

        'rainfall' => 'required',
        '*.rainfall' => 'required',
        ];
}
}
