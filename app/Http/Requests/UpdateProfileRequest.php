<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class UpdateProfileRequest extends FormRequest
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
            'name' => 'required|max:30',
            'email' => 'email|required|max:50|unique:users,email,'.Auth::id(),
            'password' => 'required|max:30',
            'role' => 'required|numeric',
            'phone' => 'max:50',
            'bio' => 'max:255',
            'status' => 'required|numeric',
            'gender' => 'required|numeric'
        ];
    }
}
