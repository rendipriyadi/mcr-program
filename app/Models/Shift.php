<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Shift extends Model
{
    public $table = "shiftcode";

    protected $fillable = [
        'shiftcode','shift','startshift','endshift'
    ];
}
