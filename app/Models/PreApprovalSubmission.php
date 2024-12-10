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
        'attachment8_path',
        'attachment9_path',
        'attachment10_path',
        'attachment11_path',
        'attachment12_path',
        'attachment13_path',
        'attachment14_path',
        'attachment15_path',
        'attachment16_path',
        'attachment17_path',
        'attachment18_path',
        'attachment19_path',
        'attachment20_path',
    ];

    public function comments()
    {
        return $this->hasMany(OffcampusComment::class, 'pre_approval_submission_id');
    }
    

}
