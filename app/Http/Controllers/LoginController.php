<?php

namespace App\Http\Controllers;

use Jenssegers\Agent\Agent;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index()
    {
        $agent = new Agent();

        // Cek apakah perangkat bukan mobile
        if (!$agent->isMobile()) {
            // Jika bukan perangkat mobile, redirect ke halaman login
            return redirect()->route('web.auth.login');
        }

        if (Auth::check()) {
            return redirect()->route('dashboard');
        }
        return view('auth.login');
    }
}
