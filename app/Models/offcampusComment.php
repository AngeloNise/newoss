<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OffcampusComment extends Model
{
    use HasFactory;

    protected $fillable = [
        'pre_approval_submission_id', // foreign key linking to submissions
        'section', // field for the comment section
        'comment', // field for the comment text
    ];

    public function submission()
    {
        return $this->belongsTo(PreApprovalSubmission::class, 'pre_approval_submission_id');
    }
}
