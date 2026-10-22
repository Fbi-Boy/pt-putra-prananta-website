<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Developer extends Model {
    protected $fillable = ['name', 'logo', 'website', 'is_active', 'order'];
    protected $casts = ['is_active' => 'boolean'];

    public function scopeActive($q) { return $q->where('is_active', true); }
}
