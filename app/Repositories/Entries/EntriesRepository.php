<?php

namespace App\Repositories\Entries;

use Illuminate\Support\Facades\Http;

class EntriesRepository
{
    private $api_url;
    private $api_consumer_key;
    private $api_consumer_secret;
    public function __construct()
    {
        $this->api_url = config('anvil.ANVIL_AWARDS_API_URL');
        $this->api_consumer_key = config('anvil.ANVIL_AWARDS_API_CONSUMER_KEY');
        $this->api_consumer_secret = config('anvil.ANVIL_AWARDS_API_CONSUMER_SECRET');
    }

    public function getAllEntriesAPI()
    {
        $api_endpoint = $this->api_url.'consumer_key='.$this->api_consumer_key.'&consumer_secret='.$this->api_consumer_secret;
        $response = Http::get($api_endpoint);
        return $response->json();
    }
}
