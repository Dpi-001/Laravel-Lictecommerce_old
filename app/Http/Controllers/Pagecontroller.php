<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use Illuminate\Http\Request;

class Pagecontroller extends Controller
{
    public function home () {
        return view('welcome');
    }
}
