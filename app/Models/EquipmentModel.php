<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EquipmentModel extends Model
{
    public $table = "equipmentmodel";

    protected $fillable = [
        'modelunit', 'type','codeunit','equipactivity','sitecode'
    ];
    public function equipment()
    {
        return $this->hasOne(Equipment::class,'type');
    }
}
