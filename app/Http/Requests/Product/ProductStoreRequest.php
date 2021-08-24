<?php

namespace App\Http\Requests\Product;

use Illuminate\Foundation\Http\FormRequest;

class ProductStoreRequest extends FormRequest
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
            'product_name' => 'required|max:255',
            'weight' => 'required|numeric',
            'description' => 'required',
            'tips' => 'required',
            'kcal' => 'required|numeric',
            'kcal_100' => 'required|numeric',
            'kj' => 'required|numeric',
            'carbohydrates' => 'required|numeric',
            'proteins' => 'required|numeric',
            'sugars' => 'required|required',
            'fats' => 'required|numeric',
            'saturated_fats' => 'required|numeric',
            'fibers' => 'max:255|nullable',
            'sodium' => 'required|numeric',
            'allergens' => 'required',
            'ingredients' => 'required',
            'salt' => 'required|numeric',
            'glycemic_load' => 'required|numeric',
            'glycemic_index' => 'required|numeric',
            'amount' => 'required|numeric',
            'status' => 'required|numeric',
            'visibility_order' => 'required|numeric',
            'new_product' => 'required|numeric',
            'shopfront' => 'required|numeric'
        ];
    }
}
