<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vehicle extends Model
{
    use HasFactory;

    protected $table = 'vehicles';

    protected $fillable = [
        'purchased_on',
        'unit_number',
        'state_used_in',
        'type',
        'year',
        'make',
        'model',
        'vin',
        'license',
        'toll_tag',
        'registration',
        'type_description',
        'front_psi',
        'rear_psi',
        'oil_threshold',
        'fuel_threshold',
        'notes',
        'ownership',
        'image',
        'employee_id',
        'company_id',
    ];
}
