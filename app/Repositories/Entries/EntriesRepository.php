<?php

namespace App\Repositories\Entries;

use App\Models\Entries;
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

    public function addEntries($data)
    {
        foreach ($data as $value) {
            $dataValue = [
                'entry_no' => $value[0],
                'timestamp' => date('Y-m-d H:i:s',strtotime($value[1])),
                'category' => $value[2],
                'subcategory' => $value[3],
                'membership' => $value[4],
                'entry_title' => $value[5],
                'implementation_period' => $value[6],
                'company_organization' => $value[7],
                'company_agency' => $value[8],
                'agency' => $value[9],
                'contact_person' => $value[10],
                'position' => $value[11],
                'email' => $value[12],
                'phone_number' => $value[13],
                'summary' => $value[14],
                'objectives' => $value[15],
                'target_audience' => $value[16],
                'execution_details' => $value[17],
                'results' => $value[18],
                'is_uploadpr' => $value[19],
                'is_uploadkv' => $value[20],
                'is_uploadloa' => $value[21],
                'other_doc' => $value[22],
                'payment_status' => $value[23],
                'proof_payment' => $value[24],
            ];

            Entries::updateOrCreate(['entry_no' => $value[0]], $dataValue);
        }
    }

    public function getEntryData($data)
    {
        $entryID = [];
        foreach ($data as $key => $value) {
            array_push($entryID, $value['entry_id']);
        }
        $additionalData = Entries::whereIn('entry_no', $entryID)->get();
        return $additionalData;
    }
}
