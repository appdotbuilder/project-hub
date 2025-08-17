<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * App\Models\SubscriptionType
 *
 * @property int $id
 * @property string $name
 * @property string|null $description
 * @property string $hourly_rate
 * @property int $included_hours
 * @property string $monthly_fee
 * @property bool $is_active
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\ClientSubscription> $clientSubscriptions
 * 
 * @method static \Illuminate\Database\Eloquent\Builder|SubscriptionType newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|SubscriptionType newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|SubscriptionType query()
 * @method static \Illuminate\Database\Eloquent\Builder|SubscriptionType whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SubscriptionType whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SubscriptionType whereHourlyRate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SubscriptionType whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SubscriptionType whereIncludedHours($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SubscriptionType whereIsActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SubscriptionType whereMonthlyFee($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SubscriptionType whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SubscriptionType whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SubscriptionType active()
 * @method static \Database\Factories\SubscriptionTypeFactory factory($count = null, $state = [])
 * 
 * @mixin \Eloquent
 */
class SubscriptionType extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'description',
        'hourly_rate',
        'included_hours',
        'monthly_fee',
        'is_active',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'hourly_rate' => 'decimal:2',
        'monthly_fee' => 'decimal:2',
        'included_hours' => 'integer',
        'is_active' => 'boolean',
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    /**
     * Get the client subscriptions for this subscription type.
     */
    public function clientSubscriptions(): HasMany
    {
        return $this->hasMany(ClientSubscription::class);
    }

    /**
     * Scope a query to only include active subscription types.
     *
     * @param  \Illuminate\Database\Eloquent\Builder  $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }
}