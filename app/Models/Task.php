<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'priority',
        'due_date',
        'is_completed',
        'project_id'
    ];

    protected $casts = [
        'due_date' => 'datetime',
        'is_completed' => 'boolean'
    ];

    public function project()
    {
        return $this->belongsTo(Project::class);
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