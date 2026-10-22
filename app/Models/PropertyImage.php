<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PropertyImage extends Model {
    protected $fillable = [
        'property_id', 'path_thumb', 'path_medium', 'path_large',
        'alt_text', 'is_primary', 'order', 'file_size_medium', 'width', 'height',
    ];
    protected $casts = ['is_primary' => 'boolean'];

    public function property() { return $this->belongsTo(Property::class); }

    protected function resolveUrl(string $path): string {
        if (str_starts_with($path, 'properties/')) {
            return asset('storage/' . $path);
        }
        return asset($path);
    }

    public function getThumbUrlAttribute(): string { return $this->resolveUrl($this->path_thumb); }
    public function getMediumUrlAttribute(): string { return $this->resolveUrl($this->path_medium); }
    public function getLargeUrlAttribute(): string { return $this->resolveUrl($this->path_large); }

    protected static function booted(): void {
        static::saving(function ($image) {
            if ($image->is_primary) {
                static::where('property_id', $image->property_id)
                    ->where('id', '!=', $image->id ?? 0)
                    ->update(['is_primary' => false]);
            }
        });
    }
}
