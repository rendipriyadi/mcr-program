<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Equipcategori extends Model
{
    
    public $table = "equipmentcategori";

    protected $fillable = [
        'categori', 'itemcategori','sitecode'
    ];
}
