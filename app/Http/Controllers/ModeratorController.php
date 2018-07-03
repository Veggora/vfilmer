<?php

namespace App\Http\Controllers;

class ModeratorController extends Controller
{
    public function panel()
    {
        return view('moderator.panel');
    }
}
