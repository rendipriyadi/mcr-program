<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Material extends Model
{
    public $table = "material";

    protected $fillable = [
        'material', 'submaterial','factor','sitecode'
    ];
}
