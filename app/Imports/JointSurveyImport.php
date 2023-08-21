<?php

namespace App\Imports;

use App\Models\JointSurvey;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class JointSurveyImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new JointSurvey([
            'sitecode' => $row['sitecode'],
            'jointmonth' => $row['jointmonth'],
            'material' => $row['material'],
            'jointtotal' => $row ['jointtotal']
        ]);
    }
}
