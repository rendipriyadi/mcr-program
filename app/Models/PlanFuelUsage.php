<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

class PlanFuelUsage extends Model
{
    public $table = "planusage";

    protected $fillable = [
        'tanggal_planusage','fuelusage','sitecode'
    ];

    public function getCreatedAtAttribute()
    {
        return Carbon::parse($this->attributes['tanggal_planusage'])
        ->translatedFormat('F Y');
    }
}
