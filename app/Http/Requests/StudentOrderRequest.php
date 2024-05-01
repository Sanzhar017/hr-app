<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class employeeOrderRequest extends FormRequest
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
          'employee_id' => 'required|array',
          'order_type_id' => 'required',
          'order_number' => 'required',
          'order_date' => 'required',
          'title' => 'required',
          'old_status_id' => 'nullable|numeric',
          's_status_id' => 'nullable|numeric',
        ];
    }
}
