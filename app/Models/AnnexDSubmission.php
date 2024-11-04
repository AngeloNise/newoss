<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AnnexDSubmission extends Model
{
    use HasFactory;

    protected $fillable = [
        'name_of_activity2',
        'place_of_activity2',
        'start_date2',
        'end_date2',
        'number_of_participants2',
        'campus_college_org2',
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
        'attachment21_path',
    ];
}
