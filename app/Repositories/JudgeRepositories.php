<?php
namespace App\Repositories;

use App\Repositories\Api\ApiRepositories;

class JudgeRepositories
{
    private $ApiRepositories;

    public function __construct(ApiRepositories $apiRepositories)
    {
        $this->ApiRepositories = $apiRepositories;
    }

    public function fetchJudgeVoteAPI()
    {
        $data = $this->ApiRepositories->fetchDataFromAPI('judge');
        return $data;
    }
}
