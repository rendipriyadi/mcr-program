<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SiteFactor extends Model
{
    public $table = "sitefactor";

    protected $fillable = [
        'sitefactorcode', 'sitecode', 'factorcode', 'startdate','enddate'
    ];
}