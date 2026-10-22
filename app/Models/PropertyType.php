<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PropertyType extends Model {
    protected $fillable = ['name', 'slug', 'icon', 'is_active', 'order'];
    protected $casts = ['is_active' => 'boolean'];

    public function properties() { return $this->hasMany(Property::class); }
    public function submissions() { return $this->hasMany(PropertySubmission::class); }
}
