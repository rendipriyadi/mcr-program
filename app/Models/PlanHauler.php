<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PlanHauler extends Model
{
    public $table = "planhauler";

    protected $fillable = [
        'tanggal_planhauler','codemodelhauler','qty_planhauler','pa_planhauler','ua_planhauler','pty_planhauler','prod_planhauler','sitecode'
    ];
}
