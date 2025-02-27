// app/Models/Tenant.php
<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use App\Models\User;
use App\Models\Store;
use App\Models\TenantPaymentHistory;

class Tenant extends Model
{
    use HasFactory, HasUuids;

    protected $fillable = [
        'name',
        'email',
        'phone',
        'address',
        'settings',
        'subscription_plan',
        'subscription_status',
        'max_stores',
        'max_users',
        'max_products',
        'features', // Stored as JSON
        'billing_day',
        'activated_at',
        'suspended_at'
    ];

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

    public function paymentHistory()
    {
        return $this->hasMany(TenantPaymentHistory::class);
    }

    // Helper methods
    public function isActive()
    {
        return $this->subscription_status === 'active' && $this->activated_at !== null && $this->suspended_at === null;
    }

    public function isSuspended()
    {
        return $this->suspended_at !== null;
    }

    public function hasFeature($feature)
    {
        if (!$this->features) {
            return false;
        }

        return in_array($feature, $this->features);
    }
}
