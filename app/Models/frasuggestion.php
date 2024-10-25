<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Frasuggestion extends Model
{
    use HasFactory;

    protected $fillable = [
        'application_id', // Foreign key referencing the application
        'section',        // The section for which the suggestion is made
        'comment',        // The suggestion/comment made by the dean
    ];

    public function application()
    {
        return $this->belongsTo(AnnexA::class, 'application_id');
    }
}
