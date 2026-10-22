<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Testimonial extends Model {
    protected $fillable = ['name', 'role', 'photo', 'rating', 'message', 'is_active', 'order'];
    protected $casts = ['is_active' => 'boolean', 'rating' => 'float'];

    public function scopeActive($q) { return $q->where('is_active', true); }
}
