<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dedicated extends Model
{
    public $table = "dedicated";

    protected $fillable = [
        'dedicatedcode', 'dedicateddesc'
    ];
}
