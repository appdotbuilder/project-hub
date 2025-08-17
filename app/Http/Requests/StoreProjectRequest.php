<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreProjectRequest extends FormRequest
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
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'client_id' => 'required|exists:users,id',
            'account_manager_id' => 'nullable|exists:users,id',
            'project_manager_id' => 'nullable|exists:users,id',
            'allocated_hours' => 'required|numeric|min:0.1|max:9999.99',
            'expected_deadline' => 'required|date|after:today',
            'status' => 'required|in:pending,in_progress,on_hold,completed,cancelled',
            'priority' => 'required|in:low,medium,high,urgent',
        ];
    }

    /**
     * Get custom error messages for validator errors.
     *
     * @return array<string, string>
     */
    public function messages(): array
    {
        return [
            'title.required' => 'Project title is required.',
            'description.required' => 'Project description is required.',
            'client_id.required' => 'Please select a client.',
            'client_id.exists' => 'Selected client is invalid.',
            'allocated_hours.required' => 'Allocated hours are required.',
            'allocated_hours.min' => 'Minimum allocated hours is 0.1.',
            'expected_deadline.required' => 'Expected deadline is required.',
            'expected_deadline.after' => 'Deadline must be in the future.',
        ];
    }
}