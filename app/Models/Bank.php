<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Bank extends Model {
    protected $fillable = [
        'name', 'code', 'logo', 'interest_rate',
        'min_tenor', 'max_tenor', 'min_dp_percent', 'is_active', 'order',
    ];
    protected $casts = [
        'is_active' => 'boolean',
        'interest_rate' => 'float',
        'min_dp_percent' => 'float',
    ];

    public function kprApplications() { return $this->hasMany(KprApplication::class); }

    public function calculateInstallment(int $price, int $dp, int $tenorYears): float {
        $principal = max(0, $price - $dp);
        $monthlyRate = $this->interest_rate / 100 / 12;
        $months = $tenorYears * 12;
        if ($monthlyRate <= 0 || $months <= 0) return 0;
        $factor = pow(1 + $monthlyRate, $months);
        return round($principal * ($monthlyRate * $factor) / ($factor - 1));
    }
}
