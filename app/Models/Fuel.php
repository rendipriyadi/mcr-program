<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fuel extends Model
{
    public $table = "fuel";

    protected $fillable = [
        'sitecode', 'fueldate', 'shiftcode', 'fuelcnunit','typecode','fuelmodel','hmbefore','hmstart','fuelcons','fueltotal','fuelusage','fuelob','fuelcoal','fuelcoaltransport'
    ];
}
