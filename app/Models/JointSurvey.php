<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JointSurvey extends Model
{
    public $table = "jointsurvey";

    protected $fillable = [
        'sitecode', 'jointmonth' ,'material','jointtotal'
    ];
}
