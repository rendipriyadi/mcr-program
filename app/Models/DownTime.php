<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DownTime extends Model
{
    public $table = "downtimecategory";

    protected $fillable = [
        'dtcategory', 'sitecode'
    ];

}
