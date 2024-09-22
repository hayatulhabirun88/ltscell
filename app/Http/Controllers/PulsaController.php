<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PulsaController extends Controller
{
    public function index()
    {
        return view('pulsa.reguler');
    }
}
