<?php

namespace App\Http\Controllers;

class Helper 
{
    public static function createAlert($type, $message)
    {
        session()->flash('alert-type', $type);
        session()->flash('alert-message', $message);
    }
}