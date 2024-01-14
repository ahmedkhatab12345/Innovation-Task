<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MovieRequest extends FormRequest
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
            'title' => 'required',
            'description' => 'required',
            'rate' => 'required|numeric|min:0|max:10',
            'category_id' => 'required|exists:categories,id',
        ];
    }

    public function messages()
    {
        return [
            'title.required' => 'Title Is Requrired',
            'description.required' => 'Description Is Requrired',
            'rate.required' => 'Rate Is Requrired',
            'rate.numeric' => 'Rate Must Be Numirc',
            'rate.min' => 'Rate Betwen 0 : 10',
            'rate.max' => 'Rate Betwen 0 : 10',
            'category_id.required' => 'Category_Id Is Required',
            'category_id.exists' => 'Value Is Not True',
        ];
    }
}
