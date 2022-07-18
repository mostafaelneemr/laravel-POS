<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreProductRequest extends FormRequest
{
    
    public function authorize()
    {
        return true;
    }

    
    public function rules()
    {
        return [
            'name' => 'required|unique:products,name->ar,'.$this->id,
            'name_en' => 'required|unique:products,name->en,'.$this->id,
            'categorie_id' => 'required',
            'price' => 'required',
        ];
    }

    public function messages()
    {   
        return[
            'name.required' => __('backend/message.name required prod'),
            'name_en.required' => __('backend/message.name_en required prod'),
            'name.unique' => __('backend/message.name unique'),
            'name_en.unique' => __('backend/message.name_en unique'),
            'categorie_id.required' => __('backend/message.choose category'),
            'price.required' => __('backend/message.price'),
        ];
            
    }
}
