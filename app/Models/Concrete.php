<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Concrete extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'concrete';

    protected $fillable = [
        'task',
        'sign',
        'leg_size',
        'offset_1',
        'offset_2',
        'sign_size',
        'leg_length_1',
        'leg_length_2',
    ];
}
