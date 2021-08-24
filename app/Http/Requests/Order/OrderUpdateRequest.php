<?php

namespace App\Http\Requests\Order;

use Illuminate\Foundation\Http\FormRequest;

class OrderUpdateRequest extends FormRequest
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
            'name' => 'required|max:255',
            'surname' => 'required|max:255',
            'email' => 'required|email',
            'phone' => 'required|numeric',
            'shipping_address' => 'required| max:255',
            'shipping_city' => 'required',
            'shipping_province' => 'required',
            'shipping_postal_code' => 'required|numeric',
            'shipping_note' => 'max:255|nullable',
            'business_name' => 'max:255|nullable',
            'vat_number' => 'alpha_num|max:12|nullable',
            'billing_code' => 'alpha_num|nullable',
            'billing_address' => 'max:255|nullable',
            'billing_city' => 'nullable',
            'billing_province' => 'nullable',
            'billing_postal_code' => 'nullable|numeric',
            'order_status' => 'required|numeric',
        ];
    }
}
