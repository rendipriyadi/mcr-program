<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    public $table = "customer";

    protected $fillable = [
        'cscode', 'csdescript', 'csaddress', 'cstelp'
    ];
}
