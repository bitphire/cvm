<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sign extends Model
{
    use HasFactory;

    protected $table = 'signs';

    protected $fillable = [
        'sign_id',
        'type',
        'size',
        'leg_size',
        'leg_one',
        'leg_two',
        'leg_one_offset',
        'leg_two_offset',
        'header_one',
        'header_two',
        'header_three',
        'header_four',
        'header_five',
        'header_size',
        'direction_one',
        'direction_two',
        'direction_three',
        'direction_four',
        'direction_five',
        'direction_six',
        'distance_one',
        'distance_two',
        'distance_three',
        'distance_four',
        'distance_five',
        'distance_size',
    ]
}
