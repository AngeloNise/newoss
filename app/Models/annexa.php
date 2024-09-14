<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class annexa extends Model
{
    protected $table = 'annexas';

    protected $fillable = [
        'name_of_project',
        'date_duration',
        'requesting_organization',
        'college_branch',
        'representative',
        'address_contact',
        'objectives',
        'estimate_income',
        'price_ticket',
        'total_estimate_ticket',
        'other_income',
        'total_estimated_income',
        'expenditures',
        'amount',
        'total_budget_expenses_php',
        'total_estimated_proceeds',
        'utilization_plan',
        'solicitation',
        'coordinator',
        'participants',
        'president',
        'treasurer',
    ];
}
