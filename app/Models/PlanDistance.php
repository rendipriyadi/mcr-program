<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PlanDistance extends Model
{
    public $table = "plandistance";

    protected $fillable = [
        'tanggal_plandistance','plan_distanceob','actual_distanceob','devisiasi_distanceob','plan_distancecoal','actual_distancecoal','devisiasi_distancecoal','sitecode'
    ];
}
