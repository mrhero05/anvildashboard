<?php
namespace App\Services;

use App\Repositories\ScreenerRepositories;
use App\Repositories\Entries\EntriesRepository;
use App\Services\Entries\EntriesServices;

class ScreenerServices
{
    private $ScreenerRepositories;
    private $EntriesRepository;
    private $EntriesServices;
    public function __construct(ScreenerRepositories $screenerRepositories, EntriesRepository $entriesRepository, EntriesServices $entriesServices) {
        $this->ScreenerRepositories = $screenerRepositories;
        $this->EntriesRepository = $entriesRepository;
        $this->EntriesServices = $entriesServices;
    }
    public function screenerFetchVote()
    {
        $data = $this->ScreenerRepositories->fetchScreenerVoteAPI();
        if ($data) {
            $dataID = [];
            foreach ($data as $key => $value) {
                $relatedEntryData = $this->getEntryByID($data[$key]['entry_id']);
                array_push($dataID, $data[$key]['entry_id']);
                $data[$key]['category'] = $relatedEntryData->category;
                $data[$key]['subcategory'] = $relatedEntryData->subcategory;
                $data[$key]['entry_title'] = $relatedEntryData->entry_title;
                $data[$key]['company_organization'] = $relatedEntryData->company_organization;
                $data[$key]['agency'] = $relatedEntryData->agency;
            }
            $entriesNotScreen = $this->getEntriesNotScreen($dataID);
            array_push($data, ...$entriesNotScreen);
        }
        return $data;
    }

    public function getEntryByID($data)
    {
        return $this->EntriesRepository->getEntryData($data);
    }

    public function getEntriesNotScreen($dataID)
    {
        $valid_entry = $this->EntriesRepository->getEntryNotScreen($dataID);
        $data = [];
        foreach ($valid_entry as $key => $value) {
            $data[$key]['id'] = '';
            $data[$key]['user_id'] = '';
            $data[$key]['entry_id'] = $value->entry_no;
            $data[$key]['ticket_number'] = '';
            $data[$key]['ticket_id'] = '';
            $data[$key]['user_role'] = 'Not Assigned';
            $data[$key]['user_name'] = 'Not Assigned';
            $data[$key]['ticket_status'] = '';
            $data[$key]['ticket_remarks'] = '';
            $data[$key]['created_at'] = '';
            $data[$key]['category'] = $value->category;
            $data[$key]['subcategory'] = $value->subcategory;
            $data[$key]['entry_title'] = $value->entry_title;
            $data[$key]['company_organization'] = $value->company_organization;
            $data[$key]['agency'] = $value->agency;
        }
        return $data;
    }
}
