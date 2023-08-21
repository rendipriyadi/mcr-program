<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Problem extends Model
{
    public $table = "problemtype";

    protected $fillable = [
        'prodproblem','sitecode'
    ];
}
