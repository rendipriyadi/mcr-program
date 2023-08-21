<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PlanFuelRatio extends Model
{
    public $table = "planratio";

    protected $fillable = [
        'tanggal_planratio','fr0b','frcoal','frtotal','sitecode'
    ];
}
