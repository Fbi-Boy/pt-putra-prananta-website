<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class PropertySubmission extends Model {
    protected $fillable = [
        'submission_code', 'access_token',
        'submitted_by', 'agent_id', 'submitter_name', 'submitter_phone', 'submitter_email',
        'title', 'description', 'listing_type', 'property_type_id', 'area_id', 'address',
        'price', 'land_area', 'building_area', 'bedrooms', 'bathrooms',
        'photo_paths', 'status', 'auto_check_result',
        'verified_by', 'verified_at', 'rejection_reason', 'admin_notes',
        'converted_property_id',
    ];

    protected $casts = [
        'photo_paths' => 'array',
        'auto_check_result' => 'array',
        'verified_at' => 'datetime',
    ];

    protected static function booted(): void {
        static::creating(function ($s) {
            if (empty($s->submission_code)) {
                $s->submission_code = 'SUB-' . now()->format('Y') . '-' . str_pad((static::max('id') ?? 0) + 1, 4, '0', STR_PAD_LEFT);
            }
            if (empty($s->access_token)) {
                $s->access_token = Str::random(32);
            }
        });
    }

    public function submitter() { return $this->belongsTo(User::class, 'submitted_by'); }
    public function agent() { return $this->belongsTo(Agent::class); }
    public function verifier() { return $this->belongsTo(User::class, 'verified_by'); }
    public function type() { return $this->belongsTo(PropertyType::class, 'property_type_id'); }
    public function area() { return $this->belongsTo(Area::class); }
    public function convertedProperty() { return $this->belongsTo(Property::class, 'converted_property_id'); }

    public function scopePending($q) { return $q->where('status', 'pending'); }
    public function scopeConverted($q) { return $q->where('status', 'converted'); }
    public function scopeRejected($q) { return $q->where('status', 'rejected'); }
}
