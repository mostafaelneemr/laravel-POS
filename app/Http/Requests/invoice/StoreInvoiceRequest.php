<?php

namespace App\Http\Requests\invoice;

use Illuminate\Foundation\Http\FormRequest;

class StoreInvoiceRequest extends FormRequest
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

        $todayDate = date('m/d/Y');

        return [
            'invoice_number' => 'required|unique:invoices',
            'invoice_date' => 'required|before_or_equal:'.$todayDate,
            'discount' => 'required',
            'price' => 'required',
            'tax_value' => 'required',
            'notes' => 'max:200',
        ];
    }

    public function messages()
    {
        return [
            'invoice_number.required' => __('backend/message.invo num req'),
            'invoice_number.unique' => __('backend/message.invo num uniq'),
            'invoice_date.required' => __('backend/message.invo date req'),
            'invoice_date.after_or_equal' => __('backend/message.invo date after'),
            'discount.required' => __('backend/message.invo discount'),
            'price.required' => __('backend/message.price'),
            'tax_value.required' => __('backend/message.tax_value req'),
            'notes.max' => __('backend/message.notes max'),
            
        ];
    }
}
