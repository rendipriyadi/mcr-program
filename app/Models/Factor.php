<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Factor extends Model
{
    public $table = "truckfactor";

    protected $fillable = [
        'truck' ,'factor','sitecode'
    ];
}
