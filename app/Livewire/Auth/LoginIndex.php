<?php

namespace App\Livewire\Auth;

use Livewire\Component;
use Illuminate\Support\Str;
use Illuminate\Auth\Events\Lockout;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Validation\ValidationException;

class LoginIndex extends Component
{

    public $no_hp;
    public $password;
    public $remember = false;
    public function login()
    {
        // Validasi input
        $this->validate([
            'no_hp' => 'required|string|min:10',  // Pastikan nomor HP diperlukan dan minimal 10 karakter
            'password' => 'required|string|min:6',  // Password minimal 6 karakter
        ], [
            'no_hp.required' => 'Nomor HP wajib diisi.',
            'no_hp.string' => 'Nomor HP harus berupa teks.',
            'no_hp.min' => 'Nomor HP minimal harus terdiri dari 10 karakter.',
            'password.required' => 'Password wajib diisi.',
            'password.string' => 'Password harus berupa teks.',
            'password.min' => 'Password minimal harus terdiri dari 6 karakter.',
        ]);

        $this->ensureIsNotRateLimited();

        if (!Auth::attempt(['no_hp' => $this->no_hp, 'password' => $this->password], $this->remember)) {
            RateLimiter::hit($this->throttleKey());

            throw ValidationException::withMessages([
                'no_hp' => 'Nomor HP atau password yang Anda masukkan salah.',
            ]);
        }

        // Reset rate limiter setelah login berhasil
        RateLimiter::clear($this->throttleKey());

        // Redirect ke halaman yang sesuai, misalnya dashboard
        return redirect()->intended('/dashboard');
    }

    protected function ensureIsNotRateLimited(): void
    {
        if (RateLimiter::tooManyAttempts($this->throttleKey(), 5)) {
            $seconds = RateLimiter::availableIn($this->throttleKey());

            throw ValidationException::withMessages([
                'no_hp' => trans('auth.throttle', [
                    'seconds' => $seconds,
                    'minutes' => ceil($seconds / 60),
                ]),
            ]);
        }
    }

    protected function throttleKey()
    {
        return Str::lower($this->no_hp) . '|' . request()->ip();
    }


    public function render()
    {
        return view('livewire.auth.login-index');
    }
}
