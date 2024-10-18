<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class PulsaDataController extends Controller
{
    public function index()
    {
        return view('pulsa.pulsadata');
    }

    public function nominal()
    {
        return view('pulsa.pulsadata_nominal');
    }

    public function view_proses()
    {
        return view('pulsa.pulsadata_view_proses');
    }

    public function paid()
    {
        return view('pulsa.pulsadata_paid');
    }

    public function paid_success()
    {
        $payment = Session::get('pulsadata_finish')['data'];
        return view('pulsa.pulsadata_paid_success', compact(['payment']));
    }
}
