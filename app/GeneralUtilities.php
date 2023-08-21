<?php

namespace App;

class GeneralUtilities
{
    public function total($ritasi)
    {
       return $ritasi->factor_truck * $ritasi->ritase;
    }
}