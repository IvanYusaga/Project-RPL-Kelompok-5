<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BlankWordsController extends Controller
{
    public function index()
    {
        return view('gamestage.blank-words-2', ['correctAnswers' => ['Pirates', 'Island', 'On', 'Treasure']]);
    }
}
