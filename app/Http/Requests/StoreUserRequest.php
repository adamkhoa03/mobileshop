<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

/**
 * Create account admin request
 *
 * @package App\Http\Requests
 */
class StoreUserRequest extends FormRequest
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
            'email' => 'email|required|unique:users,email',
            'avatar' => 'mimes: jpg,jpeg,png',
            'password' => 'required|max:15',
            'phone' => 'max:15',
            'role' => 'required',
            'status' => 'required',
            'gender' => 'required',
        ];
    }
}
