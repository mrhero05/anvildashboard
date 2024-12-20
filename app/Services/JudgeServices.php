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
            $dataID = [];
            foreach ($data as $key => $value) {
                $relatedEntryData = $this->EntriesRepository->getEntryData($data[$key]['entry_id']);
                array_push($dataID, $data[$key]['entry_id']);
                $data[$key]['entry_title'] = $relatedEntryData->entry_title;
                $data[$key]['company_organization'] = $relatedEntryData->company_organization;
                $data[$key]['agency'] = $relatedEntryData->agency;
                $mean_score = $this->getMeanScore($data[$key]);
                $data[$key]['mean_score'] = $mean_score;
                $data[$key]['final_score'] = $this->getFinalScore($data[$key], $mean_score);
                $data[$key]['standard_deviation'] = $this->getStandardDeviation($data[$key], $mean_score);
            }
            $entriesNotJudge = $this->getEntriesNotJudge($dataID);
            array_push($data, ...$entriesNotJudge);
        }
        return $data;
    }

    public function getEntriesNotJudge($dataID)
    {
        $valid_entry = $this->EntriesRepository->getEntryOnProcessing($dataID);
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
            $data[$key]['criteria_1'] = '';
            $data[$key]['criteria_2'] = '';
            $data[$key]['criteria_3'] = '';
            $data[$key]['criteria_4'] = '';
            $data[$key]['criteria_5'] = '';
            $data[$key]['criteria_6'] = '';
            $data[$key]['mean_score'] = '';
            $data[$key]['final_score'] = '';
            $data[$key]['standard_deviation'] = '';
            $data[$key]['remarks'] = '';
            $data[$key]['created_at'] = '';
            $data[$key]['main_category'] = $value->category;
            $data[$key]['sub_category'] = $value->subcategory;
            $data[$key]['entry_title'] = $value->entry_title;
            $data[$key]['company_organization'] = $value->company_organization;
            $data[$key]['agency'] = $value->agency;
        }
        return $data;
    }

    public function getMeanScore($data)
    {
        $max_criteria_scores = $this->EntriesRepository->getEntryMaxCriteriaScore($data['main_category'], $data['sub_category']);
        $weighted_score = 0;
        $sum_weighted_score = 0;

        for ($i=1; $i <= count($max_criteria_scores); $i++) {
            $weighted_score = $data['criteria_' . $i] / $max_criteria_scores['criteria_' . $i];
            $sum_weighted_score += $weighted_score;
        }
        $mean_score = $sum_weighted_score / count($max_criteria_scores);
        return round($mean_score, 4);
    }

    public function getFinalScore($data, $mean_score)
    {
        return round($mean_score * 100);
    }

    public function getStandardDeviation($data, $mean_score)
    {
        $max_criteria_scores = $this->EntriesRepository->getEntryMaxCriteriaScore($data['main_category'], $data['sub_category']);
        $weighted_score = 0;
        $sum_sd = 0;

        for ($i=1; $i <= count($max_criteria_scores); $i++) {
            $weighted_score = $data['criteria_' . $i] / $max_criteria_scores['criteria_' . $i];
            $squared_diff = round(pow($weighted_score - $mean_score, 2),4);
            $sum_sd += $squared_diff;
        }
        $variance = $sum_sd / count($max_criteria_scores);
        $standard_deviation = round(sqrt($variance) * 100, 4);
        return $standard_deviation;
    }
}
