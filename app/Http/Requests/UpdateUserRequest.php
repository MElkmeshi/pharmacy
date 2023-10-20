<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use App\Models\User; // Import the User model

class UpdateUserRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        $userId = $this->session()->get('user_id');

        return [
            'name' => 'required|string|min:3|max:40',
            'address' => 'required|string|min:3|max:100',
            'age' => 'required|integer|min:18',
            
        ];
    }
}

