<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Inquiry extends Model {
    protected $fillable = [
        'user_id', 'property_id', 'agent_id',
        'name', 'phone', 'email', 'message', 'source', 'status',
    ];

    public function user() { return $this->belongsTo(User::class); }
    public function property() { return $this->belongsTo(Property::class); }
    public function agent() { return $this->belongsTo(Agent::class); }

    public function scopeNew($q) { return $q->where('status', 'new'); }
}
