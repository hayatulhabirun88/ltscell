<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class InternetController extends Controller
{
    public function index()
    {
        return view('internet.internet');
    }

    public function paid()
    {
        return view('internet.paid');
    }

    public function paid_success()
    {
        $payment = Session::get('payment')['data'];
        return view('internet.paid_success', compact(['payment']));
    }

}
