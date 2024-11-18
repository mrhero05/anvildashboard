<?php
namespace App\Services;

use App\Repositories\DashboardRepositories;

class DashboardServices
{
    private $DashboardRepositories;
    public function __construct(DashboardRepositories $dashboardRepositories) {
        $this->DashboardRepositories = $dashboardRepositories;
    }

    public function getActivityLog()
    {
        $data = $this->DashboardRepositories->fetchActivityLogAPI();
        return $data;
    }
}
