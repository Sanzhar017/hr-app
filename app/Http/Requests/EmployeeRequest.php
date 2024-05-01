<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EmployeeRequest extends FormRequest
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
        'first_name' => 'required|string|max:255',
        'last_name' => 'required|string|max:255',
        'surname' => 'required|string|int|max:255',
        'email' => 'required|email|max:255',
        'phone_number' => 'required|string||max:100',
        'date_of_birth' => 'required|date|max:255',
        'nationality' => 'required|string|max:100',
        'job_title' => 'required|string|max:255',
        'status_id' => 'required|integer|exists:statuses,id|max:255',
        'department_id' => 'required|integer|exists:departments,id|max:255',
      ];
    }
}
