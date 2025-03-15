<?php

namespace App\Http\Requests\Task;

use Illuminate\Foundation\Http\FormRequest;

class CreateTaskRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     */
    public function rules(): array
    {
        return [
            'name' => ['required', 'string', 'max:255'],
            'description' => ['required', 'string'],
            'project_id' => ['required', 'exists:projects,id'],
            // 'priority' => ['required', 'in:low,medium,high'],
            // 'due_date' => ['required', 'date', 'after:today'],
            'user_id' => ['required', 'exists:users,id'],
            // 'status' => ['required', 'in:todo,in_progress,done'],
            // 'attachments' => ['nullable', 'array'],
            // 'attachments.*' => ['file', 'max:10240'], // 10MB max
        ];
    }

    /**
     * Get custom messages for validator errors.
     */
    public function messages(): array
    {
        return [
            'title.required' => __('tasks.validation.title_required'),
            'title.max' => __('tasks.validation.title_max'),
            'description.required' => __('tasks.validation.description_required'),
            'project_id.required' => __('tasks.validation.project_required'),
            'project_id.exists' => __('tasks.validation.project_exists'),
            'assigned_to.required' => __('tasks.validation.assigned_to_required'),
            'assigned_to.exists' => __('tasks.validation.assigned_to_exists'),
            'priority.required' => __('tasks.validation.priority_required'),
            'priority.in' => __('tasks.validation.priority_in'),
            'due_date.required' => __('tasks.validation.due_date_required'),
            'due_date.date' => __('tasks.validation.due_date_date'),
            'due_date.after' => __('tasks.validation.due_date_after'),
            'estimated_hours.required' => __('tasks.validation.estimated_hours_required'),
            'estimated_hours.numeric' => __('tasks.validation.estimated_hours_numeric'),
            'estimated_hours.min' => __('tasks.validation.estimated_hours_min'),
            'attachments.*.max' => __('tasks.validation.attachment_max_size'),
        ];
    }
} 