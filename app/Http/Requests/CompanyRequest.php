<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CompanyRequest extends FormRequest
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
            'name' => 'required|string',
            'email' => 'required|email|unique:companies',
            'website' => 'required|string',
            'logo' => 'required|image|dimensions:min_width=100,min_height=100'
        ];

        if($this->method() == "PUT")
        {
            $roles['email'] = 'required|email|unique:companies,email,' . $this->segment(3);
            $roles['logo'] = 'image|dimensions:min_width=100,min_height=100';
        }

        return $roles;
    }
}
