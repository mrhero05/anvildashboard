<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Entries extends Model
{
    use HasFactory;

    protected $table = 'entries';

    protected $fillable = [
        'entry_no',
        'timestamp',
        'category',
        'subcategory',
        'membership',
        'entry_title',
        'implementation_period',
        'company_organization',
        'company_agency',
        'agency',
        'contact_person',
        'position',
        'email',
        'phone_number',
        'summary',
        'objectives',
        'target_audience',
        'execution_details',
        'results',
        'is_uploadpr',
        'is_uploadkv',
        'is_uploadloa',
        'other_doc',
        'payment_status',
        'proof_payment',
    ];

}
