<?php

namespace App\Http\Controllers;

class AdminController extends Controller
{
    public function panel()
    {
        return view('admin.panel');
    }
}
