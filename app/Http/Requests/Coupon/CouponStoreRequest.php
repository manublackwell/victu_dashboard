<?php

namespace App\Http\Requests\Coupon;

use Illuminate\Foundation\Http\FormRequest;

class CouponStoreRequest extends FormRequest
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
            "code" => "required|string|unique:coupon,codice",
            "numeric_discount" => "required|numeric",
            "percentage_discount" => "required|numeric",
            "start_date" => "required|date",
            "end_date" => "required|date",
            "quantity" => "required|numeric",
            "mediator" => "required|numeric",
            "box" => "required|numeric",
            "multiuse" => "required|numeric",
            "meal_voucher" => "required|numeric"
        ];
    }
}
