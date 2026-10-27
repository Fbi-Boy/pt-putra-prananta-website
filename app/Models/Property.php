<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Str;

class Property extends Model {
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'code', 'title', 'slug', 'description', 'listing_type',
        'property_type_id', 'area_id', 'agent_id',
        'address', 'latitude', 'longitude', 'show_exact_location', 'map_radius_meter',
        'price', 'price_unit', 'price_dropped_at',
        'land_area', 'building_area', 'bedrooms', 'bathrooms',
        'carports', 'floors', 'year_built', 'certificate',
        'status', 'is_recommended', 'is_kpr_eligible',
        'video_provider', 'video_id', 'view_count', 'published_at',
        'submitted_by', 'submission_id', 'verified_by', 'verified_at',
        'created_by',
    ];

    protected $casts = [
        'show_exact_location' => 'boolean',
        'is_recommended' => 'boolean',
        'is_kpr_eligible' => 'boolean',
        'published_at' => 'datetime',
        'price_dropped_at' => 'datetime',
        'verified_at' => 'datetime',
        'latitude' => 'float',
        'longitude' => 'float',
    ];

    protected static function booted(): void {
        static::creating(function ($p) {
            if (empty($p->slug)) {
                $p->slug = Str::slug($p->title) . '-' . Str::random(5);
            }
            if (empty($p->code)) {
                $p->code = 'PRP-' . str_pad((self::withTrashed()->max('id') ?? 0) + 1, 4, '0', STR_PAD_LEFT);
            }
        });
    }

    public function images() { return $this->hasMany(PropertyImage::class)->orderBy('order'); }
    public function primaryImage() { return $this->hasOne(PropertyImage::class)->where('is_primary', true); }
    public function type() { return $this->belongsTo(PropertyType::class, 'property_type_id'); }
    public function area() { return $this->belongsTo(Area::class); }
    public function agent() { return $this->belongsTo(Agent::class); }
    public function facilities() { return $this->belongsToMany(Facility::class, 'property_facilities'); }
    public function favorites() { return $this->hasMany(Favorite::class); }
    public function inquiries() { return $this->hasMany(Inquiry::class); }
    public function kprApplications() { return $this->hasMany(KprApplication::class); }
    public function creator() { return $this->belongsTo(User::class, 'created_by'); }
    public function submitter() { return $this->belongsTo(User::class, 'submitted_by'); }
    public function verifier() { return $this->belongsTo(User::class, 'verified_by'); }
    public function submission() { return $this->belongsTo(PropertySubmission::class); }

    public function scopePublished($q) { return $q->where('status', 'published'); }
    public function scopeSale($q) { return $q->where('listing_type', 'sale'); }
    public function scopeRent($q) { return $q->where('listing_type', 'rent'); }
    public function scopeRecommended($q) { return $q->where('is_recommended', true); }
    public function scopeKprEligible($q) { return $q->where('is_kpr_eligible', true); }

    public function getBadgeAttribute(): ?array {
        if ($this->price_dropped_at && $this->price_dropped_at->diffInDays(now()) <= 30) {
            return ['label' => 'TURUN HARGA', 'color' => 'red'];
        }
        if ($this->published_at && $this->published_at->diffInDays(now()) <= 7) {
            return ['label' => 'BARU', 'color' => 'green'];
        }
        if ($this->is_recommended) {
            return ['label' => 'REKOMENDASI', 'color' => 'orange'];
        }
        return null;
    }

    public function getVideoEmbedUrlAttribute(): ?string {
        if (!$this->video_provider || !$this->video_id) return null;
        return match($this->video_provider) {
            'youtube' => "https://www.youtube.com/embed/{$this->video_id}",
            'vimeo'   => "https://player.vimeo.com/video/{$this->video_id}",
            default   => null,
        };
    }

    public function getVideoThumbnailAttribute(): ?string {
        if ($this->video_provider === 'youtube' && $this->video_id) {
            return "https://img.youtube.com/vi/{$this->video_id}/maxresdefault.jpg";
        }
        return null;
    }

    public function getPriceFormattedAttribute(): string {
        $price = $this->price;
        if ($price >= 1_000_000_000) {
            return 'Rp ' . number_format($price / 1_000_000_000, 1, ',', '.') . ' M';
        }
        if ($price >= 1_000_000) {
            return 'Rp ' . number_format($price / 1_000_000, 0, ',', '.') . ' Jt';
        }
        return 'Rp ' . number_format($price, 0, ',', '.');
    }
}
