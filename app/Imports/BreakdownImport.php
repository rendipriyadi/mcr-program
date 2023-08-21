<?php

namespace App\Imports;

use App\Models\Breakdown;
use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\SkipsEmptyRows;
use Maatwebsite\Excel\Concerns\SkipsErrors;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithValidation;

class BreakdownImport implements ToModel, WithHeadingRow, SkipsEmptyRows, WithValidation
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */

    use Importable, SkipsErrors;

    public function model(array $row)
    {
        return new Breakdown([
            'sitecode' => $row ['sitecode'],
            'breakdate' => $row ['breakdate'],
            'breakshift' => $row ['breakshift'],
            'breaktype' => $row ['breaktype'],
            'breakmodel' => $row ['breakmodel'],
            'breakcnunit' => $row ['breakcnunit'],
            'bdawal' => $row ['bdawal'],
            'bdakhir' => $row ['bdakhir'],
            'breaktotal' => $row ['breaktotal'],
            'bdcategory' => $row ['bdcategory'],
            'breakstatus' => $row ['breakstatus'],
            'bddesc' => $row ['bddesc']
        ]);
    }

    public function rules():array
    {
        return [
        'sitecode' => 'required',
        '*.sitecode' => 'required',

        'breakdate' => 'required',
        '*.breakdate' => 'required',

        'breakshift' => 'required',
        '*.breakshift' => 'required',

        'breaktype' => 'required',
        '*.breaktype' => 'required',

        'breakmodel' => 'required',
        '*.breakmodel' => 'required',

        'breakcnunit' => 'required',
        '*.breakcnunit' => 'required',

        'bdawal' => 'required',
        '*.bdawal' => 'required',

        'bdakhir' => 'required',
        '*.bdakhir' => 'required',

        'breaktotal' => 'required',
        '*.breaktotal' => 'required',


        'breaktotal' => 'required',
        '*.breaktotal' => 'required',

        'bdcategory' => 'required',
        '*.bdcategory' => 'required',


        'breakstatus' => 'required',
        '*.breakstatus' => 'required',

        'bddesc' => 'required',
        '*.bddesc' => 'required',
        ];
    }
}
