<?php
namespace App\Services;

use App\Repositories\JudgeRepositories;
use App\Repositories\Entries\EntriesRepository;

class JudgeServices
{
    private $JudgeRepositories;
    private $EntriesRepository;
    public function __construct(JudgeRepositories $judgeRepositories, EntriesRepository $entriesRepository) {
        $this->JudgeRepositories = $judgeRepositories;
        $this->EntriesRepository = $entriesRepository;
    }
    public function fetchJudgeVote()
    {
        $data = $this->JudgeRepositories->fetchJudgeVoteAPI();
        if ($data) {
            foreach ($data as $key => $value) {
                $relatedEntryData = $this->EntriesRepository->getEntryData($data[$key]['entry_id']);
                $data[$key]['entry_title'] = $relatedEntryData->entry_title;
                $data[$key]['company_organization'] = $relatedEntryData->company_organization;
                $data[$key]['agency'] = $relatedEntryData->agency;
                $data[$key]['mean_score'] = 0;
                $data[$key]['final_score'] = 0;
                $data[$key]['standard_deviation'] = 0;
            }
        }
        // dd($data);
        return $data;
    }
}
