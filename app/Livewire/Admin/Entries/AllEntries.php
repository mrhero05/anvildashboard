<?php

namespace App\Livewire\Admin\Entries;

use Livewire\Component;
use App\Services\Entries\EntriesServices;

class AllEntries extends Component
{
    private $EntriesServices;
    public function mount(EntriesServices $entriesServices)
    {
        $this->EntriesServices = $entriesServices;
    }

    public function render()
    {
        $entries = $this->EntriesServices->fetchAllEntries();
        return view('livewire.admin.entries.all-entries', compact('entries'));
    }
}
