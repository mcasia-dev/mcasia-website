<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Partner extends Model
{
    use HasFactory;

    protected $table = 'partnership_data';

    protected $fillable = [
        'name',
        'blk_no',
        'street',
        'barangay',
        'subdivision',
        'country',
        'zip_code',
        'mobile_number',
        'landline_number',
        'business_name',
        'business_address',
        'business_number',
        'business_website',
        'business_email',
    ];
}
