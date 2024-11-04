<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PreApprovalSubmission extends Model
{
    use HasFactory;

    protected $fillable = [
        'name_of_activity',
        'place_of_activity',
        'start_date',
        'end_date',
        'number_of_participants',
        'campus_college_org',
        'attachment1_path',
        'attachment2_path',
        'attachment3_path',
        'attachment4_path',
        'attachment5_path',
        'attachment6_path',
        'attachment7_path',
    ];
}
