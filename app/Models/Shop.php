<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Shop extends Model
{
    use HasFactory;

    protected $table = 'shops';

    protected $fillable = [
        'name',
        'district',
        'address',
        'city',
        'zip',
        'phone',
        'do_not_use',
        'priority',
        'works_on',
        'type',
    ];
}
