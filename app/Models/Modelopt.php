<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Modelopt extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'operator';
    protected $primaryKey = 'optnik';
    public $timestamps = true;
}
