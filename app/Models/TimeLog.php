<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * App\Models\TimeLog
 *
 * @property int $id
 * @property int $task_id
 * @property int $user_id
 * @property string $hours_logged
 * @property string|null $description
 * @property string $work_date
 * @property \Illuminate\Support\Carbon|null $start_time
 * @property \Illuminate\Support\Carbon|null $end_time
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Task $task
 * @property-read \App\Models\User $user
 * 
 * @method static \Illuminate\Database\Eloquent\Builder|TimeLog newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|TimeLog newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|TimeLog query()
 * @method static \Illuminate\Database\Eloquent\Builder|TimeLog whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TimeLog whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TimeLog whereEndTime($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TimeLog whereHoursLogged($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TimeLog whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TimeLog whereStartTime($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TimeLog whereTaskId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TimeLog whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TimeLog whereUserId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TimeLog whereWorkDate($value)
 * @method static \Database\Factories\TimeLogFactory factory($count = null, $state = [])
 * 
 * @mixin \Eloquent
 */
class TimeLog extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'task_id',
        'user_id',
        'hours_logged',
        'description',
        'work_date',
        'start_time',
        'end_time',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'hours_logged' => 'decimal:2',
        'work_date' => 'date',
        'start_time' => 'datetime',
        'end_time' => 'datetime',
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    /**
     * Get the task that owns the time log.
     */
    public function task(): BelongsTo
    {
        return $this->belongsTo(Task::class);
    }

    /**
     * Get the user who logged the time.
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}