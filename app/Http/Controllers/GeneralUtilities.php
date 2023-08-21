<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GeneralUtilities 
{
     public function total($ritasi)
     {
        return $ritasi->factor_truck * $ritasi->ritase;
     }
}
