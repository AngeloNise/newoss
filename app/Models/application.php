<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Application extends Model
{
    use HasFactory;

    protected $fillable = [
        'name_of_project',
        'name_of_organization',
        'proposed_activity',
        'start_date',
        'end_date',
        'college_branch',
        'total_estimated_income',
        'status',
        'current_file_location',
        'submission_date'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
