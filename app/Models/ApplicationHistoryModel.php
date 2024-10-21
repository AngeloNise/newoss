<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ApplicationHistoryModel extends Model
{
    use HasFactory;

    protected $table = 'application_histories'; // Specify the table name

    protected $fillable = [
        'organization_id',
        'document',
        'date_issued',
        'proposed_activity',
        'location',
        'status',
    ];

    public function organization()
    {
        return $this->belongsTo(Organization::class);
    }
}
