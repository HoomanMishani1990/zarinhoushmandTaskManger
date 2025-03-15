<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Task extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'status',
        'priority',
        'due_date',
        'project_id',
        'user_id',
    ];

    protected $casts = [
        'due_date' => 'datetime',
        'is_completed' => 'boolean'
    ];

    public function project(): BelongsTo
    {
        return $this->belongsTo(Project::class);
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function getPriorityLabelAttribute(): string
    {
        return match($this->priority) {
            'low' => 'text-info',
            'medium' => 'text-warning',
            'high' => 'text-danger',
            default => 'text-secondary'
        };
    }
} 