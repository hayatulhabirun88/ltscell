<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class PlnPrabayarController extends Controller
{
    public function index()
    {
        return view('pln.prabayar');
    }

    public function paid()
    {
        return view('pln.plnprabayar_paid');
    }

    public function paid_success()
    {
        $payment = Session::get('plnprabayar_paid')['data'];
        return view('pln.plnprabayar_paid_success', compact(['payment']));
    }
}
