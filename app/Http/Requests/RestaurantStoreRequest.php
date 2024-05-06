<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RestaurantStoreRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'name' => 'required|string|max:200',
            'phone' => 'required|string|max:20',
            'p_iva' => 'required|unique:restaurants|digits:11',
            'image' => 'nullable|image',
            'address' => 'required|string|max:150',
            'types' => 'exists:types,id'
        ];
    }
}