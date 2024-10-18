<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class PlnPascaController extends Controller
{
    public function index()
    {
        return view('pln.pln_pasca');
    }

    public function paid()
    {
        return view('pln.plnpasca_paid');
    }

    public function paid_success()
    {
        $payment = Session::get('payment')['data'];
        return view('pln.plnpasca_paid_success', compact(['payment']));
    }
}
