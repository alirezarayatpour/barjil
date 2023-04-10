<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreProductRequest extends FormRequest
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
            'title' => 'required|min:5|max:30',
            'description' => 'required',
            'storage' => 'required',
            'price' => 'required',
            'sale' => 'required',
            'cover_1' => 'required|mimes:jpeg,png,jpg,gif',
            'cover_2' => 'required|mimes:jpeg,png,jpg,gif',
            'images[]' => 'required',
            'category_id' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'title.required' => 'پر کردن این فیلد اجباری است',
            'title.min' => 'عنوان باید حداقل 5 کاراکتر باشد',
            'title.max' => 'عنوان باید حداکثر 30 کاراکتر باشد',
            'description.required' => 'پر کردن این فیلد اجباری است',
            'storage.required' => 'پر کردن این فیلد اجباری است',
            'price.required' => 'پر کردن این فیلد اجباری است',
            'sale.required' => 'پر کردن این فیلد اجباری است',
            'cover_1.required' => 'پر کردن این فیلد اجباری است',
            'cover_2.required' => 'پر کردن این فیلد اجباری است',
            'category_id.required' => 'پر کردن این فیلد اجباری است',
        ];
    }
}
