<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Ritasi extends Model
{
    public $table = "ritasi";

    protected $fillable = ['sitecode','date','shift','time','nikloader','oploader','nikhauler','ophauler','codeloader','modelloader','codehauler','modelhauler','block','pit','distance','ritase','material','submaterial','produksi','adjustment','distvol','factor','detail','dumping'];

    public function hourly()
    {
    	return $this->hasMany(Hourly::class,'sitecode','shift','time','date','codeloader','adjustment','material');
    }


}
