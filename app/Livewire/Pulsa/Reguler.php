<?php

namespace App\Livewire\Pulsa;

use Livewire\Component;
use Illuminate\Support\Facades\Session;

class Reguler extends Component
{
    public $no_hp;

    public function cari_harga_pulsa()
    {
        $this->validate([
            'no_hp' => 'required|string|min:10'
        ]);


    }

    public function store()
    {
        $this->validate([
            'no_hp' => ['required', 'regex:/^0[2-9][0-9]{8,12}$/'],
        ], [
            'no_hp.required' => 'Nomor handphone harus diisi.',
            'no_hp.regex' => 'Format nomor handphone tidak valid.',
        ]);

        // Deteksi provider
        $no_hp = $this->no_hp;

        if (preg_match('/^0(811|812|813|821|822|823|852|853)/', $no_hp)) {
            $provider = 'Telkomsel';
        } elseif (preg_match('/^0(814|815|816|855|856|857|858)/', $no_hp)) {
            $provider = 'Indosat';
        } elseif (preg_match('/^0(895|896|897|898|899)/', $no_hp)) {
            $provider = 'Three';
        } elseif (preg_match('/^0(817|818|819|859)/', $no_hp)) {
            $provider = 'XL';
        } elseif (preg_match('/^0(851)/', $no_hp)) {
            $provider = 'by.U';
        } elseif (preg_match('/^0(881|882|883|884|885|886|887|888)/', $no_hp)) {
            $provider = 'Smart';
        }

        Session::put('provider', $provider);
        Session::put('no_hp', $no_hp);

        return redirect()->route('pulsa.pilih-nominal');

    }

    public function render()
    {
        return view('livewire.pulsa.reguler');
    }
}
