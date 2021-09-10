<?php

namespace App\Http\Requests\Product;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'photo'       => 'nullable|mimes:jpeg,png,jpg|max:7168',
            'name'        => 'required|string|between:1,256',
            'description' => 'required|string|between:1,1024',
            'price'       => 'required|numeric|between:0,99999999.99'
        ];
    }
}
