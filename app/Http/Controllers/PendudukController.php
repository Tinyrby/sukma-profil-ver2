<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use illuminate\view\view;

class PendudukController extends Controller
{
    public function index() : view
    {
        return view('index');
    }
}
