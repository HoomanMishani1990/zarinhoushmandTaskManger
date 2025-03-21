<?php

namespace App\Http\Requests\Task;

use Illuminate\Foundation\Http\FormRequest;

class UpdateTaskRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name' => ['required', 'string', 'max:255'],
            'description' => ['required', 'string'],
            'project_id' => ['required', 'exists:projects,id'],
            'assigned_to' => ['required', 'exists:users,id'],
            'priority' => ['required', 'in:low,medium,high'],
            'due_date' => ['required', 'date'],
            'estimated_hours' => ['required', 'numeric', 'min:0'],
            'attachments' => ['nullable', 'array'],
            'attachments.*' => ['file', 'max:10240'],
            'remove_attachments' => ['nullable', 'array'],
            'remove_attachments.*' => ['string']
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => __('tasks.validation.title_required'),
            'name.max' => __('tasks.validation.title_max'),
            'description.required' => __('tasks.validation.description_required'),
            'project_id.required' => __('tasks.validation.project_required'),
            'project_id.exists' => __('tasks.validation.project_exists'),
            'assigned_to.required' => __('tasks.validation.assigned_to_required'),
            'assigned_to.exists' => __('tasks.validation.assigned_to_exists'),
            'priority.required' => __('tasks.validation.priority_required'),
            'priority.in' => __('tasks.validation.priority_in'),
            'due_date.required' => __('tasks.validation.due_date_required'),
            'due_date.date' => __('tasks.validation.due_date_date'),
            'estimated_hours.required' => __('tasks.validation.estimated_hours_required'),
            'estimated_hours.numeric' => __('tasks.validation.estimated_hours_numeric'),
            'estimated_hours.min' => __('tasks.validation.estimated_hours_min')
        ];
    }
} 