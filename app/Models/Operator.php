<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Operator extends Model
{
    public $table = "operator";

    protected $fillable = [
        'optnik', 'optnama', 'optversati', 'optsite','no_telp'
    ];
}
