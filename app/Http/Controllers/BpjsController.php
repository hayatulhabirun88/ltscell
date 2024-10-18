<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class BpjsController extends Controller
{
    public function index()
    {
        return view('bpjs.bpjs');
    }

    public function paid()
    {
        return view('bpjs.paid');
    }

    public function paid_success()
    {
        $payment = Session::get('payment')['data'];
        return view('bpjs.paid_success', compact(['payment']));
    }
}
