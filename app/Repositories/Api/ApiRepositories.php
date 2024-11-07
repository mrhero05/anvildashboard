<?php

namespace App\Repositories\Api;

use Illuminate\Support\Facades\Http;

class ApiRepositories
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

    public function fetchDataFromAPI($param)
    {
        $response = Http::withBasicAuth($this->api_user,$this->api_password)->get($this->api_url . '?data='.$param);
        return $response->json();
    }
}
