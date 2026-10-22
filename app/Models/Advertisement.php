<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Advertisement extends Model {
    protected $fillable = [
        'title', 'image', 'link', 'position', 'is_active',
        'start_date', 'end_date', 'order',
    ];
    protected $casts = [
        'is_active' => 'boolean',
        'start_date' => 'date',
        'end_date' => 'date',
    ];

    public function scopeActive($q) {
        return $q->where('is_active', true)
            ->where(function ($q) {
                $q->whereNull('start_date')->orWhere('start_date', '<=', now());
            })
            ->where(function ($q) {
                $q->whereNull('end_date')->orWhere('end_date', '>=', now());
            });
    }

    public function scopePosition($q, $pos) { return $q->where('position', $pos); }
}
