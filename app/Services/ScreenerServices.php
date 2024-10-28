<?php
namespace App\Services;

use App\Repositories\ScreenerRepositories;
use App\Repositories\Entries\EntriesRepository;

class ScreenerServices
{
    private $ScreenerRepositories;
    private $EntriesRepository;
    public function __construct(ScreenerRepositories $screenerRepositories, EntriesRepository $entriesRepository) {
        $this->ScreenerRepositories = $screenerRepositories;
        $this->EntriesRepository = $entriesRepository;
    }
    public function screenerFetchVote()
    {
        $data = $this->ScreenerRepositories->fetchScreenerVoteAPI();
        // dd($relatedEntryData);
        foreach ($data as $key => $value) {
            $relatedEntryData = $this->getEntryByID($data[$key]['entry_id']);
            $data[$key]['category'] = $relatedEntryData->category;
            $data[$key]['subcategory'] = $relatedEntryData->subcategory;
            $data[$key]['entry_title'] = $relatedEntryData->entry_title;
            $data[$key]['company_organization'] = $relatedEntryData->company_organization;
            $data[$key]['agency'] = $relatedEntryData->agency;
        }
        return $data;
    }

    public function getEntryByID($data)
    {
        return $additional_data = $this->EntriesRepository->getEntryData($data);
    }
}
