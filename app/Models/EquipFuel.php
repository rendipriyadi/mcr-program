<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EquipFuel extends Model
{
    public $table = "equipmentfuel";

    protected $fillable = [
        'category', 'type','model','codeunit','dedicated'
    ];
}