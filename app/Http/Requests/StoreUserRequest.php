<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class storeUserRequest extends FormRequest
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
            'user_name' => 'required|min:3|max:40',
            'user_password'=> 'required|min:5|max:100',
            'first_name' => 'required|min:3|max:40',
            'last_name' => 'required|min:3|max:40',
            'email' => 'required|email|unique:users,email',
            'phone_number'=> 'required||unique:users,phone_number|numeric',
            'favourite' => 'nullable',
            'birth' => 'required',
        ];
    }

    public function messages(){
      return [
        "user_name.required" => "Please enter your user name.",
        "user_name.min" => "User name must be at least 3 characters.",
        "user_name.max" => "User name must be less than 40 characters.",
        "user_password.required" => "Please enter your password.",
        "user_password.min" => "Password must be at least 5 characters.",
        "user_password.max" => "Password must be less than 100 characters.",
        "first_name.required" => "Please enter your first name.",
        "first_name.min" => "First name must be at least 3 characters.",
        "first_name.max" => "First name must be less than 40 characters.",
        "last_name.required" => "Please enter your last name.",
        "last_name.min" => "Last name must be at least 3 characters.",
        "last_name.max" => "Last name must be less than 40 characters.",
        "email.required" => "Please enter your email address.",
        "email.email" => "Please enter a valid email address.",
        "email.unique" => "Email address already exists.",
        "phone_number.required" => "Please enter your phone number.",
        "birth.required" => "Please chose your birthday.",
        "phone_number.unique" => "Phone number already exists.",
        "phone_number.numeric" => "Phone number must be a number."
      ];
    }
}
