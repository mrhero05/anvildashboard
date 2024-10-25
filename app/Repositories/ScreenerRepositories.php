<?php
namespace App\Repositories;

use Illuminate\Support\Facades\Http;

class ScreenerRepositories
{
    private $api_url;
    private $api_user;
    private $api_password;
    public function __construct()
    {
        $this->api_url = config('anvil.OSTICKET_API_URL');
        $this->api_user = config('anvil.OSTICKET_API_USER');
        $this->api_password = config('anvil.OSTICKET_API_PASS');
    }

    public function fetchScreenerVoteAPI()
    {
        $response = Http::withBasicAuth($this->api_user,$this->api_password)->get($this->api_url);
        return $response->json();
    }
}
