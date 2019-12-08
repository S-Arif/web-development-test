<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EmployeeRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return auth('admin')->check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $roles = [
            'company_id' => 'required|exists:companies,id',
            'first_name' => 'required|string',
            'last_name' => 'required|string',
            'email' => 'required|email|string|unique:employees,email',
            'phone' => 'required'
        ];

        if($this->method() == "PUT")
            $roles['email'] = 'required|email|unique:employees,email,' . $this->segment(3);

        return $roles;
    }

    public function messages()
    {
        return [
            'company_id.required' => 'The Company field is required.'
        ];
    }
}
