<?php
namespace App\Services\Entries;

use App\Repositories\Entries\EntriesRepository;
use Carbon\Carbon;

class EntriesServices
{
    private $EntriesRepository;

    public function __construct(EntriesRepository $entriesRepository) {
        $this->EntriesRepository = $entriesRepository;
    }

    public function fetchAllEntries()
    {
        $allEntries = $this->EntriesRepository->getAllEntriesAPI();
        $allEntriesArray = [];
        // dd($allEntries);
        foreach ($allEntries as $entry => $value){
            foreach ($value['line_items'] as $item){
                if (!isset($allEntriesArray[$entry])) {
                    $allEntriesArray[$entry] = [];
                }
                $formattedDate = Carbon::parse($value['date_created'])->format('F j, Y H:i:s');
                array_push($allEntriesArray[$entry], $value['id']);
                array_push($allEntriesArray[$entry], $formattedDate);
                array_push($allEntriesArray[$entry], $item['name']);
                $fieldLoa = False;
                $otherSupportingDocuments = '';
                $proofOfPayment = '';
                $fields = $this->fields();
                foreach ($item['meta_data'] as $meta_value) {
                    if(isset($fields[$meta_value['key']])){
                        $fields[$meta_value['key']] = $meta_value['value'];
                    }
                    // Checker for LOA
                    if($meta_value['key'] == '_wapf_meta'){
                        foreach ($meta_value['value'] as $dataLOA) {
                            if($dataLOA['value'] == 'Upload Letter of Authorization (as pdf)')
                            $fieldLoa = True;
                        }
                    }
                    if($meta_value['key'] == 'Other Supporting Documents'){
                        $otherSupportingDocuments = $meta_value['value'];
                    }
                }
                foreach ($fields as $field) {
                    array_push($allEntriesArray[$entry], $field);
                }
                foreach ($value['meta_data'] as $item){
                    if ($item['key'] == '_alg_checkout_files_upload_1'){
                        $proofOfPayment = $item['value'][0]['tmp_name'];
                    }
                }
                array_push($allEntriesArray[$entry], True);
                array_push($allEntriesArray[$entry], True);
                array_push($allEntriesArray[$entry], $fieldLoa);
                array_push($allEntriesArray[$entry], $otherSupportingDocuments);
                array_push($allEntriesArray[$entry], $value['status']);
                array_push($allEntriesArray[$entry], $proofOfPayment);
            }
        }
        // dd($allEntriesArray);
        return $allEntriesArray;
    }

    public function fetchLatestEntries()
    {
        $data = $this->fetchAllEntries();
        if($data != null){
            $this->EntriesRepository->addEntries($data);
            return true;
        }else{
            return false;
        }
    }

    public function fields()
    {
        $fields = [
            'Subcategories:' => 'None',
            'Membership' => '',
            'Entry Title:' => '',
            'Entry Implementation Period:' => '',
            'Company/Organization (under which the entry should be submitted):' => '',
            'Company/Agency Name to Appear in Anvil Trophy:' => '',
            'Agency (if nominating under an agency):' => '',
            'Contact Person (for notification if shortlisted):' => '',
            'Position:' => '',
            'Email Address:' => '',
            'Telephone/Mobile No.' => '',
            'Create a 150-word Executive Summary that provides a concise overview of your entry.' => '',
            'Objectives' => '',
            'Target Audience' => '',
            'Execution Details' => '',
            'Results' => '',
        ];
        return $fields;
    }
}
