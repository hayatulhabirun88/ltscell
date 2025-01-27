<?php

namespace App\Livewire\Pengaturan;

use Livewire\Component;
use App\Models\Pengaturan;

class PengaturanIndex extends Component
{
    public $mark_up;
    public function mount()
    {
        $this->mark_up = Pengaturan::find(1)->mark_up;
    }

    public function updateMarkup()
    {
        $pengaturan = Pengaturan::find(1);
        $pengaturan->mark_up = $this->mark_up;
        $pengaturan->save();
        session()->flash('message', 'Markup telah diubah');
    }
    public function render()
    {
        return view('livewire.pengaturan.pengaturan-index');
    }
}
