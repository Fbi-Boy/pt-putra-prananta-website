<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Area extends Model {
    protected $fillable = ['name', 'slug', 'type', 'parent_id', 'is_active'];
    protected $casts = ['is_active' => 'boolean'];

    public function parent() { return $this->belongsTo(Area::class, 'parent_id'); }
    public function children() { return $this->hasMany(Area::class, 'parent_id'); }
    public function properties() { return $this->hasMany(Property::class); }
    public function submissions() { return $this->hasMany(PropertySubmission::class); }
    public function agents() {
        return $this->belongsToMany(Agent::class, 'agent_areas')
            ->withPivot('is_primary')
            ->withTimestamps();
    }
}
