<?php

namespace App\Exports;

use App\Models\JointSurvey;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromView;

class JointSurveyExport implements FromView
{
    /**
    * @return \Illuminate\Support\Collection
    */
   public function view(): View
        {
            return view('jointsurvey.export', [
                'jointsurvey' => JointSurvey::all()
            ]);
        }
    
}
