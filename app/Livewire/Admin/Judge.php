<?php

namespace App\Livewire\Admin;

use App\Services\JudgeServices;
use Livewire\Component;

class Judge extends Component
{
    private $JudgeServices;
    public function mount(JudgeServices $judgeServices)
    {
        $this->JudgeServices = $judgeServices;
    }

    public function render()
    {
        $data = $this->JudgeServices->fetchJudgeVote();
        return view('livewire.admin.judge',compact('data'));
    }
}
