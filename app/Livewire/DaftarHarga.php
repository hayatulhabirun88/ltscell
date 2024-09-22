<?php

namespace App\Livewire;

use App\Models\Postpaid;
use App\Models\Prepaid;
use Livewire\Component;

class DaftarHarga extends Component
{
    public $kategori, $subKategori, $postprepaid;
    public $daftarHarga = [];

    public function updatedPostprepaid()
    {
        $this->kategori = null;
        $this->subKategori = null;
    }


    public function updatedKategori()
    {
        $this->subKategori = null;

        if ($this->postprepaid == 'Prepaid') {
            // Atur daftar harga sesuai kategori atau kosongkan
            $this->daftarHarga = ($this->kategori == 'pln')
                ? Prepaid::where('product_category', $this->kategori)->orderBy('product_price', 'asc')->get()
                : [];
        } else {
            // Atur daftar harga sesuai kategori atau kosongkan
            $this->daftarHarga = Postpaid::where('type', $this->kategori)->orderBy('komisi', 'asc')->get();
        }


    }

    public function updatedSubKategori()
    {

        if ($this->postprepaid == 'Prepaid') {
            // Atur daftar harga berdasarkan kategori dan subKategori
            $this->daftarHarga = Prepaid::where('product_category', $this->kategori)
                ->where('product_description', 'like', '%' . $this->subKategori . '%')
                ->orderBy('product_price', 'asc')
                ->get();
        } else {
            // Atur daftar harga berdasarkan kategori dan subKategori
            $this->daftarHarga = Postpaid::where('type', $this->kategori)
                ->orderBy('komisi', 'asc')
                ->get();
        }

    }

    public function render()
    {
        return view('livewire.daftar-harga');
    }
}
