<?php
namespace App\Repositories;

use App\Repositories\Api\ApiRepositories;
use Illuminate\Support\Facades\Http;

class ScreenerRepositories
{
    private $ApiRepositories;

    public function __construct(ApiRepositories $apiRepositories)
    {
        $this->ApiRepositories = $apiRepositories;
    }

    public function fetchScreenerVoteAPI()
    {
        return $this->ApiRepositories->fetchDataFromAPI('screener');
    }
}
