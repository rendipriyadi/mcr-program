<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Hourly extends Model
{
    public $table = "hourly";

    public function ritasi()
    {
    	return $this->belongsTo(Ritasi::class,'sitecode','date','shift','time','codeloader','material','adjusment');
    }
}
