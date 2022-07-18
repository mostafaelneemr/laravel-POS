<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class storeCategoryRequest extends FormRequest
{
    
    public function authorize()
    {
        return true;
    }


    public function rules()
    {
        return [
            // validate on category non repeat
            'name' => 'required|unique:categories,name->ar,'.$this->id,
            'name_en' => 'required|unique:categories,name->en,'.$this->id,
        ];
    }

    public function messages()
    {
        return [
            'name.required' => __('backend/message.name required cat'),
            'name_en.required' => __('backend/message.name_en required cat'),
            'name.unique' => __('backend/message.name unique'),
            'name_en.unique' => __('backend/message.name_en unique'),
        ];
    }
}
