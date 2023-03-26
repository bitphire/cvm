<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Maintenance extends Model
{
    use HasFactory;

    protected $table = 'maintenances';

    protected $fillable = [
        'tax',
        'total',
        'description',
        'dropped_off_on',
        'picked_up_on',
        'vehicle_id',
        'dropped_off_by_id',
        'picked_up_by_id',
        'shop_id',
    ];
}
