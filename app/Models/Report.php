<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Report extends Model
{
    protected $fillable = [
        'type',
        'notes',
        'username',
    ];

    protected $casts = [
        // TODO: add type enum backed
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];
}
