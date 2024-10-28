<?php

namespace App\Http\Controllers\Api\Entries;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\Entries\EntriesServices;

class EntriesController extends Controller
{
    protected $EntriesServices;
    public function __construct(EntriesServices $entriesServices) {
        $this->EntriesServices = $entriesServices;
    }

    public function getLatestEntries()
    {
        $data = $this->EntriesServices->fetchLatestEntries();
        if ($data) {
            toast('Fetch data Successfully!','success')->autoClose(2000)->position('bottom-end');
            return redirect()->back();
        }else{
            toast('No Entries Available','warning')->autoClose(2000)->position('bottom-end');
            return redirect()->back();
        }
    }
}
