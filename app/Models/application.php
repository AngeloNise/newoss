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
        'place_of_activity',
        'status',
        'current_file_location',
        'frapost',
        'submission_date'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Define the relationship to comments
    public function comments()
    {
        return $this->hasMany(Comment::class, 'application_id');
    }

    public function logs()
    {
        return $this->hasMany(ApplicationLog::class)->orderBy('created_at', 'desc'); // Newest logs first
    }    
}
