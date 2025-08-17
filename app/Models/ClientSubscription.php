<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * App\Models\ClientSubscription
 *
 * @property int $id
 * @property int $user_id
 * @property int $subscription_type_id
 * @property string $purchased_hours
 * @property string $used_hours
 * @property string $remaining_hours
 * @property string $status
 * @property string|null $expires_at
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\User $client
 * @property-read \App\Models\SubscriptionType $subscriptionType
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Transaction> $transactions
 * 
 * @method static \Illuminate\Database\Eloquent\Builder|ClientSubscription newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ClientSubscription newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ClientSubscription query()
 * @method static \Illuminate\Database\Eloquent\Builder|ClientSubscription whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ClientSubscription whereExpiresAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ClientSubscription whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ClientSubscription wherePurchasedHours($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ClientSubscription whereRemainingHours($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ClientSubscription whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ClientSubscription whereSubscriptionTypeId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ClientSubscription whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ClientSubscription whereUsedHours($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ClientSubscription whereUserId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ClientSubscription active()
 * @method static \Database\Factories\ClientSubscriptionFactory factory($count = null, $state = [])
 * 
 * @mixin \Eloquent
 */
class ClientSubscription extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'user_id',
        'subscription_type_id',
        'purchased_hours',
        'used_hours',
        'remaining_hours',
        'status',
        'expires_at',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'purchased_hours' => 'decimal:2',
        'used_hours' => 'decimal:2',
        'remaining_hours' => 'decimal:2',
        'expires_at' => 'date',
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    /**
     * Get the client that owns the subscription.
     */
    public function client(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    /**
     * Get the subscription type.
     */
    public function subscriptionType(): BelongsTo
    {
        return $this->belongsTo(SubscriptionType::class);
    }

    /**
     * Get the transactions for this subscription.
     */
    public function transactions(): HasMany
    {
        return $this->hasMany(Transaction::class);
    }

    /**
     * Scope a query to only include active subscriptions.
     *
     * @param  \Illuminate\Database\Eloquent\Builder  $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeActive($query)
    {
        return $query->where('status', 'active');
    }
}