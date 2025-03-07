<?php

namespace App\Http\Requests;
namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreApplicantRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true; 
    }

    public function rules(): array
    {
        return [
            'region' => 'required|string',
            'province' => 'required|string',
            'city' => 'required|string',
            'last_name' => 'required|string',
            'first_name' => 'required|string',
            'middle_name' => 'nullable|string',
            'sex' => 'required|in:Male,Female,Other',
            'age' => 'required|integer',
            'marital_status' => 'required|string',
            'course' => 'nullable|string',
            'position_applied' => 'required|string',
        ];
    }
}
