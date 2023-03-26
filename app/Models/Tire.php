<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tire extends Model
{
    use HasFactory;

    protected $table = 'ties';

    protected $fillable = [
        'size',
        'brand',
        'model',
        'type',
        'has_warranty',
        'warranty_mileage',
        'price',
        'placement',
        'purchased_on',
        'vehicle_id',
        'shop_id',
    ];
}
