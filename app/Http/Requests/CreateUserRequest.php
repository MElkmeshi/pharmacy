<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateUserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'username' => 'required|string|min:3|max:40',
            'email' => 'required|email|unique:users', // Ensure email is unique in the "users" table
            'password' => 'required|string|min:8', // Adjust the minimum password length as needed
            'address' => 'required|string|min:3|max:100', // Adjust max length as needed
            'age' => 'required|integer|min:18', // Adjust the minimum age as needed
            'role' => 'required|in:admin,user', // Check for specific roles (admin or user)
        ];
    }
}
