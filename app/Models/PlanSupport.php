<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PlanSupport extends Model
{
    public $table = "plansupport";

    protected $fillable = [
        'tanggal_plansupport','codemodelsupport','qty_plansupport','pa_plansupport','ua_plansupport','sitecode'
    ];
}
