<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class frontendcontroller extends Controller
{
    public function allproduct()
    {
        return view('allproduct');
    }
}
