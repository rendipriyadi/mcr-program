<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Breakdown extends Model
{
    public $table = "breakdown";

    protected $fillable = [
        'sitecode', 'breakdate','breakshift','breaktype','breakmodel','breakcnunit','bdawal','bdakhir','breaktotal','bdcategory','breakstatus','bddesc'
    ];
}
