<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use App\Services\ScreenerServices;
use RealRashid\SweetAlert\Facades\Alert;

class Screener extends Component
{
    private $ScreenerServices;
    public function mount(ScreenerServices $screenerServices)
    {
        $this->ScreenerServices = $screenerServices;
    }

    public function render()
    {
        $data = $this->ScreenerServices->screenerFetchVote();
        return view('livewire.admin.screener', compact('data'));
    }
}
