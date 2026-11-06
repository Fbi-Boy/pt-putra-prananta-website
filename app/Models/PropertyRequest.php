<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PropertyRequest extends Model
{
    protected $guarded = ['id'];
    protected $casts = ['features' => 'array'];
}
