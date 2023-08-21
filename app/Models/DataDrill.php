<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DataDrill extends Model
{
    public $table = "datadrill";

    protected $fillable = [
        'factorcode', 'modelfactor' ,'modelcode'
    ];
}
