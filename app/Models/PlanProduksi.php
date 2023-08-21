<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PlanProduksi extends Model
{
    public $table = "planproduksi";

    protected $fillable = [
        'tanggal_planproduksi','plan_site','plan_budget','sitecode'
    ];
}
