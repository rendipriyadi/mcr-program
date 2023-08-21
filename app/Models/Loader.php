<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Loader extends Model
{
    public $table = "loader";

    protected $fillable = [
        'category', 'type' ,'modelloader','codeloader','sitecode'
    ];
}
