<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class orderdetailspost extends FormRequest
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
            // en exist hay dos formatos exist:table,colum
            // o en todo caso el nombre de la tabla solo :table 
            'order' => 'required|exist:orders',
            'product' => 'required|exist:product',
            'unit_price' => 'required|digits_between:0.00,999999.99',
            'discount' => 'required|digits_between:0.00,999999.99|nullable',
            'num_items' => 'required|',
            'iva' => 'required|digits_between:0.00,999999.99',
            'total' => 'required|digits_between:0.00,999999.99',
       ];
    }

    public function messages()
    {
        return[
            'order.message' => 'Id de orden no valido',
            'product.message' => 'Id de Producto no valido',
        ]
    }
}
