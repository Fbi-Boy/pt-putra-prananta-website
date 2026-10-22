<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Agent extends Model {
    protected $fillable = [
        'user_id', 'name', 'slug', 'photo', 'phone', 'whatsapp',
        'email', 'bio', 'status', 'verified_at', 'verified_by',
        'rejection_reason', 'order',
    ];

    protected $casts = ['verified_at' => 'datetime'];

    protected static function booted(): void {
        static::creating(function ($a) {
            if (empty($a->slug)) {
                $a->slug = Str::slug($a->name) . '-' . Str::random(4);
            }
        });
    }

    public function user() { return $this->belongsTo(User::class); }
    public function verifier() { return $this->belongsTo(User::class, 'verified_by'); }
    public function properties() { return $this->hasMany(Property::class); }
    public function inquiries() { return $this->hasMany(Inquiry::class); }
    public function submissions() { return $this->hasMany(PropertySubmission::class); }
    public function areas() {
        return $this->belongsToMany(Area::class, 'agent_areas')
            ->withPivot('is_primary')
            ->withTimestamps();
    }

    public function scopeActive($q) { return $q->where('status', 'active'); }
    public function scopePending($q) { return $q->where('status', 'pending'); }
}
