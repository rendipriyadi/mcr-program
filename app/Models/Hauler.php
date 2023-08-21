<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hauler extends Model
{
    public $table = "hauler";

    protected $fillable = [
        'category', 'type' ,'modelhauler','codehauler', 'factor','sitecode'
    ];
}
