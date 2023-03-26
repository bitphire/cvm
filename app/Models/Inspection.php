<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Inspection extends Model
{
    use HasFactory;

    protected $table = 'inspections';

    protected $fillable = [
        'mileage',
        'external_damage',
        'leaks_under',
        'leaks_engine',
        'oil_level',
        'coolant_level',
        'power_steering_level',
        'transmission_level',
        'horn',
        'wiper_blades',
        'washer_level',
        'lights',
        'mirrors',
        'fire_extinguisher',
        'first_aid_kit',
        'psi_df',
        'psi_dro',
        'psi_dri',
        'psi_pf',
        'psi_pro',
        'psi_pri',
        'psi_spare',
        'comments',
        'driver_id',
        'completed_by_id',
        'vehicle_id',
    ];
}
