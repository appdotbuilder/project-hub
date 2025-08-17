<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * App\Models\ProjectAttachment
 *
 * @property int $id
 * @property int $project_id
 * @property string $filename
 * @property string $file_path
 * @property string $mime_type
 * @property int $file_size
 * @property int $uploaded_by
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Project $project
 * @property-read \App\Models\User $uploader
 * 
 * @method static \Illuminate\Database\Eloquent\Builder|ProjectAttachment newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ProjectAttachment newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ProjectAttachment query()
 * @method static \Illuminate\Database\Eloquent\Builder|ProjectAttachment whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProjectAttachment whereFilePath($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProjectAttachment whereFileSize($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProjectAttachment whereFilename($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProjectAttachment whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProjectAttachment whereMimeType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProjectAttachment whereProjectId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProjectAttachment whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProjectAttachment whereUploadedBy($value)
 * @method static \Database\Factories\ProjectAttachmentFactory factory($count = null, $state = [])
 * 
 * @mixin \Eloquent
 */
class ProjectAttachment extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'project_id',
        'filename',
        'file_path',
        'mime_type',
        'file_size',
        'uploaded_by',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'file_size' => 'integer',
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    /**
     * Get the project that owns the attachment.
     */
    public function project(): BelongsTo
    {
        return $this->belongsTo(Project::class);
    }

    /**
     * Get the user who uploaded the attachment.
     */
    public function uploader(): BelongsTo
    {
        return $this->belongsTo(User::class, 'uploaded_by');
    }
}