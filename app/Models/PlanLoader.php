<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PlanLoader extends Model
{
    public $table = "planloader";

    protected $fillable = [
        'tanggal_planloader','codemodelloader','qty_planloader','pa_planloader','ua_planloader','ua_planloader','pty_planloader','prod_planloader','sitecode'
    ];
}
