<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PlanWeather extends Model
{
    public $table = "planweather";

    protected $fillable = [
        'tanggal_weather','plan_rain','plan_slippery','plan_rainfall','sitecode'
    ];
}
