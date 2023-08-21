<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MeterHour extends Model
{
    public $table = "hourmeter";

    protected $fillable = [
        'sitecode', 'datehm' ,'shift','nikopthm','opthm','modelhm','cnunithm','hmawal','hmakhir','totalhm','remarkhm'
    ];
}
