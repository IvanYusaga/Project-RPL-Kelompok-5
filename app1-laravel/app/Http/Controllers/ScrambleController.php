<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ScrambleController extends Controller
{
    public function index()
    {
        return view('gamestage.scrambleword');
    }
}
