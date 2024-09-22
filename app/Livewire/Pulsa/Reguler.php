<?php

namespace App\Livewire\Pulsa;

use Livewire\Component;

class Reguler extends Component
{
    public $no_hp;

    public function cari_harga_pulsa()
    {
        $this->validate([
            'no_hp' => 'required|string|min:10'
        ]);


    }
    public function render()
    {
        return view('livewire.pulsa.reguler');
    }
}
