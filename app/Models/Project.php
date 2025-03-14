<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Project extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'client_name',
        'total_budget',
        'spent_budget',
        'start_date',
        'deadline',
        'description',
        'total_hours',
        'spent_hours',
        'total_tasks',
        'completed_tasks',
        'progress_percentage',
        'members_count',
        'comments_count',
        'status',
        'image_path',
    ];

    protected $casts = [
        'start_date' => 'date',
        'deadline' => 'date',
        'total_budget' => 'decimal:2',
        'spent_budget' => 'decimal:2',
        'progress_percentage' => 'integer',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function tasks(): HasMany
    {
        return $this->hasMany(Task::class);
    }

    public function members(): BelongsToMany
    {
        return $this->belongsToMany(User::class, 'project_members')
                    ->withTimestamps();
    }

    public function comments(): HasMany
    {
        return $this->hasMany(Comment::class);
    }

    public function getRemainingDaysAttribute(): int
    {
        return now()->diffInDays($this->deadline, false);
    }

    public function getBudgetProgressAttribute(): float
    {
        return $this->total_budget > 0 
            ? ($this->spent_budget / $this->total_budget) * 100 
            : 0;
    }

    public function updateProgress(): void
    {
        $this->progress_percentage = $this->total_tasks > 0 
            ? ($this->completed_tasks / $this->total_tasks) * 100 
            : 0;
        $this->save();
    }

    public function scopeActive($query)
    {
        return $query->where('status', 'active');
    }
} 