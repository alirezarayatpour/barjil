<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreFooterItemRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        if (auth()->user()->role == 1 || auth()->user()->role == 2){
            return true;
        } else {
            return false;
        }
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'item' => 'required|min:5|max:30',
            'column' => 'required',
            'link' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'item.required' => 'پر کردن این فیلد اجباری است',
            'item.min' => 'عنوان باید حداقل 5 کاراکتر باشد',
            'item.max' => 'عنوان باید حداکثر 30 کاراکتر باشد',
            'column.required' => 'پر کردن این فیلد اجباری است',
            'link.required' => 'پر کردن این فیلد اجباری است',
        ];
    }
}
