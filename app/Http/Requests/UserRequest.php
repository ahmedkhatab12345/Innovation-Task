<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
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
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'birthdate' => 'required|date',
        ];
    }

     public function messages()
    {
        return [
            'name.required' => 'Name Is Required',
            'email.required' => 'Email Is REquired',
            'email.email' => 'Email Must Be Valid Email',
            'email.unique' => 'This Email Orldy Exist',
            'birthdate.required' => 'Birthdate Is Requierd',
            'birthdate.date' => 'Birthdate Must Valid Birthdate',
        ];
    }


}
