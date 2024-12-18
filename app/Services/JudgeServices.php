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
                $mean_score = $this->getMeanScore($data[$key]);
                $data[$key]['mean_score'] = $mean_score;
                $data[$key]['final_score'] = $this->getFinalScore($data[$key]);
                $data[$key]['standard_deviation'] = $this->getStandardDeviation($data[$key], $mean_score);
            }
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

    public function getFinalScore($data)
    {
        return round((($data['criteria_1'] + $data['criteria_2'] + $data['criteria_3'] + $data['criteria_4'] + $data['criteria_5'] + $data['criteria_6']) / 100) * 100);
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
