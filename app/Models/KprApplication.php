<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class KprApplication extends Model {
    protected $fillable = [
        'user_id', 'property_id', 'bank_id',
        'name', 'phone', 'email',
        'property_price', 'down_payment', 'tenor_years',
        'interest_rate', 'monthly_installment', 'status', 'notes',
    ];

    protected $casts = ['interest_rate' => 'float'];

    public function user() { return $this->belongsTo(User::class); }
    public function property() { return $this->belongsTo(Property::class); }
    public function bank() { return $this->belongsTo(Bank::class); }
}
