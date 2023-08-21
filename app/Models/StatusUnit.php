<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StatusUnit extends Model
{
    public $table = "statusunit";

    protected $fillable = [
        'sitecode', 'statusunitdate', 'statusopt', 'statusnikopt','statuscnunit','statusmodel','statusitemcat','statuscategory','statusstart','statusend','statushour','statusshift','statuscode','dedicated','statusremark'
    ];
}
