<?php
namespace App\Services;

use App\Repositories\ScreenerRepositories;

class ScreenerServices
{
    private $ScreenerRepositories;
    public function __construct(ScreenerRepositories $screenerRepositories) {
        $this->ScreenerRepositories = $screenerRepositories;
    }
    public function screenerFetchVote()
    {
        return $this->ScreenerRepositories->fetchScreenerVoteAPI();
    }
}
