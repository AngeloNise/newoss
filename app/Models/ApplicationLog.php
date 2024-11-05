<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ApplicationLog extends Model
{
    use HasFactory;

    protected $fillable = [
        'application_id',
        'start_date',
        'end_date',
        'total_estimated_income',
        'status',
        'current_file_location',
        'submission_date',
        'updated_at' // For tracking when the update occurred
    ];

    public function application()
    {
        return $this->belongsTo(Application::class);
    }
}
