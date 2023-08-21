<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TypeLocation extends Model
{
    public $table = "locationtype";

    protected $fillable = [
        'lokasicode', 'lokasidesc'
    ];
}
