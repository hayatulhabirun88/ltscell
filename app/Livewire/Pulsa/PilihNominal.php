<?php

namespace App\Livewire\Pulsa;

use App\Models\Prepaid;
use Livewire\Component;
use Illuminate\Support\Facades\Session;

class PilihNominal extends Component
{
    public function render()
    {
        $daftarHarga = Prepaid::where('product_category', 'pulsa')
            ->where('product_description', 'like', '%' . Session::get('provider') . '%')
            ->orderBy('product_price', 'asc')
            ->get();
        return view('livewire.pulsa.pilih-nominal', compact(['daftarHarga']));
    }
}
