<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Support\Str;

class Tenant extends Model
{
    use HasFactory, HasUuids;

    protected $primaryKey = 'id';
    protected $keyType = 'string';
    public $incrementing = false;
    protected $guarded = [];

    protected $casts = [
        'settings' => 'array',
        'features' => 'array',
        'activated_at' => 'datetime',
        'suspended_at' => 'datetime',
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    // Relationships
    public function users()
    {
        return $this->hasMany(User::class);
    }

    public function stores()
    {
        return $this->hasMany(Store::class);
    }

    public function paymentHistories() // Renamed for consistency
    {
        return $this->hasMany(TenantPaymentHistory::class);
    }

    // Helper methods
    public function isActive(): bool
    {
        return $this->subscription_status === 'active' && !is_null($this->activated_at) && is_null($this->suspended_at);
    }

    public function isSuspended(): bool
    {
        return !is_null($this->suspended_at);
    }

    public function hasFeature(string $feature): bool
    {
        return is_array($this->features) && in_array($feature, $this->features);
    }
}
