<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class News extends Model {
    protected $fillable = [
        'title', 'slug', 'excerpt', 'content', 'image',
        'category', 'author_id', 'published_at', 'is_published',
    ];
    protected $casts = ['is_published' => 'boolean', 'published_at' => 'datetime'];

    protected static function booted(): void {
        static::creating(function ($n) {
            if (empty($n->slug)) $n->slug = Str::slug($n->title) . '-' . Str::random(5);
        });
    }

    public function author() { return $this->belongsTo(User::class, 'author_id'); }
    public function scopePublished($q) { return $q->where('is_published', true); }
}
