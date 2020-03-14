<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateProductFormRequest extends FormRequest
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
            'title' => ['required', 'min:5'],
            'description' => ['required', 'min:5', 'max:255'],
            'price' => ['required', 'numeric'],
            'brand' => ['required', 'min:3'],
            'condition' => ['required', 'min:3'],
            'quantity' => ['numeric'],
        ];
    }

    /**
     * Returns validation error messages to to frontend
     *
     * @return array
     */
    public function messages()
    {
        return [
            'title.required' => 'Title is required',
            'title.min' => 'Title can not be less than five characters',
            'description.required' => 'Description is required',
            'description.min' => 'Description can not be less than five characters',
            'description.max' => 'Description can not be more than 255 characters',
            'price.required' => 'Price is required',
            'price.numeric' => 'Price must be a numeric type',
            'brand.required' => 'Brand is required ',
            'brand.min' => 'Brand can not be less than three characters',
            'condition.required' => 'Condition is required',
            'condition.min' => 'Condition can not be less than three characters',
            'quantity.numeric' => 'Quantity must be a numeric type',
        ];
    }
}
