<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class preevalstatuscreation extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_email',
        'name_of_organization',
        'date_issued',
        'pre_eval_type',
        'documents',
        'status',
    ];
}