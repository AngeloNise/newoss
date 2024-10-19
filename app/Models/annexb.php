<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class annexb extends Model
{
    protected $table = 'annexbs';

    protected $fillable = [
        'name_of_org',
        'img',
        'semester',
        'school_year',
        'period_covered',
        'cash_balance',
        'cash_receipt',
        'solicitation',
        'cash_available',
        'cash_disbursements',
        'ending_cash_balance',
        'date_receipt',
        'invoice_no_receipt',
        'particulars',
        'amount',
        'remarks_receipt',
        'total_receipt',
        'date_disburse',
        'invoice_no_disburse',
        'description',
        'purpose',
        'remarks_disburse',
        'total_disburse',
        'prepared',
        'checked',
        'approved',
        'certified',
    ];
}