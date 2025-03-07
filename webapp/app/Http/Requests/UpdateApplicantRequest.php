<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateApplicantRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true; 
    }

    public function rules(): array
    {
        return [
            'region' => 'sometimes|string',
            'province' => 'sometimes|string',
            'city' => 'sometimes|string',
            'last_name' => 'sometimes|string',
            'first_name' => 'sometimes|string',
            'middle_name' => 'sometimes|nullable|string',
            'sex' => 'sometimes|in:Male,Female,Other',
            'age' => 'sometimes|integer',
            'marital_status' => 'sometimes|string',
            'course' => 'sometimes|nullable|string',
            'position_applied' => 'sometimes|string',
        ];
    }
}
