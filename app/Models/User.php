<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable {
    use HasFactory, Notifiable;

    protected $fillable = [
        'name', 'email', 'password', 'google_id', 'avatar',
        'role', 'phone', 'is_active',
    ];

    protected $hidden = ['password', 'remember_token'];

    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
        'is_active' => 'boolean',
    ];

    public function agent() { return $this->hasOne(Agent::class); }
    public function favorites() { return $this->hasMany(Favorite::class); }
    public function inquiries() { return $this->hasMany(Inquiry::class); }
    public function kprApplications() { return $this->hasMany(KprApplication::class); }
    public function submittedProperties() { return $this->hasMany(Property::class, 'submitted_by'); }
    public function verifiedProperties() { return $this->hasMany(Property::class, 'verified_by'); }
    public function submissions() { return $this->hasMany(PropertySubmission::class, 'submitted_by'); }
    public function news() { return $this->hasMany(News::class, 'author_id'); }

    public function isAdmin(): bool { return $this->role === 'admin'; }
    public function isAgent(): bool { return $this->role === 'agent'; }
}
