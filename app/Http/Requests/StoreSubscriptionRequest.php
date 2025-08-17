<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreSubscriptionRequest extends FormRequest
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
            'user_id' => 'required|exists:users,id',
            'subscription_type_id' => 'required|exists:subscription_types,id',
            'purchased_hours' => 'required|numeric|min:0|max:9999.99',
            'remaining_hours' => 'required|numeric|min:0|max:9999.99',
            'status' => 'required|in:active,inactive,suspended',
            'expires_at' => 'nullable|date|after:today',
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
            'user_id.required' => 'Please select a client.',
            'user_id.exists' => 'Selected client is invalid.',
            'subscription_type_id.required' => 'Please select a subscription type.',
            'subscription_type_id.exists' => 'Selected subscription type is invalid.',
            'purchased_hours.required' => 'Purchased hours are required.',
            'purchased_hours.min' => 'Purchased hours cannot be negative.',
            'remaining_hours.required' => 'Remaining hours are required.',
            'remaining_hours.min' => 'Remaining hours cannot be negative.',
        ];
    }
}