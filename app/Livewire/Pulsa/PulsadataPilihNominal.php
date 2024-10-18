<?php

namespace App\Livewire\Pulsa;

use App\Models\Prepaid;
use Livewire\Component;
use Illuminate\Support\Facades\Session;

class PulsadataPilihNominal extends Component
{
    public function render()
    {
        $daftarHarga = Prepaid::where('product_category', 'data')
            ->where('product_description', 'like', '%' . Session::get('provider') . '%')
            ->orderBy('product_price', 'asc')
            ->get();
        return view('livewire.pulsa.pulsadata-pilih-nominal', compact(['daftarHarga']));
    }
}
