<?php
namespace App\Repositories;

use App\Repositories\Api\ApiRepositories;

class DashboardRepositories
{
    private $ApiRepositories;

    public function __construct(ApiRepositories $apiRepositories)
    {
        $this->ApiRepositories = $apiRepositories;
    }

    public function fetchActivityLogAPI()
    {
        $data = $this->ApiRepositories->fetchDataFromAPI('activity_log');
        return $data;
    }
}
