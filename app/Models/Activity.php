<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Activity extends Model
{
    public $table = "activitytype";

    protected $fillable = [
        'activitycode', 'activitydesc'
    ];
}
