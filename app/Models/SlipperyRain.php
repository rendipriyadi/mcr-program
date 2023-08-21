<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SlipperyRain extends Model
{
    public $table = "rainslippery";

    protected $fillable = [
        'sitecode', 'rainslipdate', 'rainslipshift', 'rainstart','rainend','rainhour','slipperystart','slipperyend','slipperyhour','rainfall'
    ];
}
