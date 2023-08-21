<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sub extends Model
{
    public $table = "submaterial";

    protected $fillable = [
        'subdesc', 'subcode', 'materialcode', 'materialfactor'
    ];
}
