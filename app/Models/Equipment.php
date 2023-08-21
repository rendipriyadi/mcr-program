<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Equipment extends Model
{
    public $table = "equipment";

    protected $fillable = [
        'category', 'type', 'modelunit', 'codeunit','codemodel','fungsi_equip','truck_factor','equipactivity', 'sitecode'
    ];


}
