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
        'status',
        'current_file_location',
        'submission_date',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
