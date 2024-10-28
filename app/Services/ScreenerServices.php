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
        $fullData = [];
        $data = $this->ScreenerRepositories->fetchScreenerVoteAPI();
        $relatedEntryData = $this->getEntryByID($data);
        foreach ($data as $key => $value) {
            $data[$key]['category'] = $relatedEntryData[$key]->category;
            $data[$key]['subcategory'] = $relatedEntryData[$key]->subcategory;
            $data[$key]['entry_title'] = $relatedEntryData[$key]->entry_title;
            $data[$key]['company_organization'] = $relatedEntryData[$key]->company_organization;
            $data[$key]['agency'] = $relatedEntryData[$key]->agency;
        }
        return $data;
    }

    public function getEntryByID($data)
    {
        return $additional_data = $this->EntriesRepository->getEntryData($data);
    }
}
