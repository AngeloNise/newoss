<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class annexc extends Model
{
    protected $table = 'annexcs';

    protected $fillable = [
        'name',
        'email',
        'qty',
        'unit',
        'item_description',
        'serial_no',
        'property_no',
        'unit_cost',
        'total_amount',
    ];
}
