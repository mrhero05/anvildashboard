<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use App\Services\DashboardServices;

class Dashboard extends Component
{
    protected $DashboardRepositories;
    public function mount(DashboardServices $dashboardServices)
    {
        $this->DashboardRepositories = $dashboardServices;
    }

    public function render()
    {
        $activity_log = $this->DashboardRepositories->getActivityLog();
        return view('livewire.admin.dashboard', compact('activity_log'));
    }
}
