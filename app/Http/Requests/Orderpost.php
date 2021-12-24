<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class Orderpost extends FormRequest
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
            'user' => 'required|exist:orders',
            'costumer' => 'required|exist:costumers',
            'sub_total' => 'required|digits_between:0.000,999999.99',
            'discount' => 'required|digits_between:0.000,999999.99',
            'iva' => 'required|digits_between:0.00,999999.99',
            'total' => 'required|digits_between:0.000,999999.99',
        ];
    }
}
