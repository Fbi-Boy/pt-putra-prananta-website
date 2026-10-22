<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Facility extends Model {
    protected $fillable = ['name', 'icon', 'is_active'];
    protected $casts = ['is_active' => 'boolean'];

    public function properties() {
        return $this->belongsToMany(Property::class, 'property_facilities');
    }
}
