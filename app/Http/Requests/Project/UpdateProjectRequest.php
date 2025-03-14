<?php

namespace App\Http\Requests\Project;

use Illuminate\Foundation\Http\FormRequest;

class UpdateProjectRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return $this->user()->can('update', $this->route('project'));
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => ['required', 'string', 'max:255'],
            'client_name' => ['nullable', 'string', 'max:255'],
            'total_budget' => ['nullable', 'numeric', 'min:0'],
            'start_date' => ['required', 'date'],
            'deadline' => ['required', 'date', 'after:start_date'],
            'description' => ['required', 'string'],
            'status' => ['required', 'in:todo,in_progress,done'],
        ];
    }

    /**
     * Get custom messages for validator errors.
     */
    public function messages(): array
    {
        return [
            'name.required' => 'نام پروژه الزامی است',
            'name.max' => 'نام پروژه نمی‌تواند بیشتر از 255 کاراکتر باشد',
            'start_date.required' => 'تاریخ شروع الزامی است',
            'deadline.required' => 'تاریخ پایان الزامی است',
            'deadline.after' => 'تاریخ پایان باید بعد از تاریخ شروع باشد',
            'description.required' => 'توضیحات پروژه الزامی است',
            'status.required' => 'وضعیت پروژه الزامی است',
            'status.in' => 'وضعیت پروژه نامعتبر است',
        ];
    }
} 