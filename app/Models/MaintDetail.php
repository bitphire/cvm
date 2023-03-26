<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MaintDetails extends Model
{
    use HasFactory;

    protected $table = 'maint_details';

    protected $fillable = [
        'job',
        'parts',
        'labor',
        'comments',
        'maintenance_id',
    ];
}
