<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreContactRequest extends FormRequest
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
            'phone' => 'required',
            'email' => 'required',
            'whatsapp' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'phone.required' => 'پر کردن این فیلد اجباری است',
            'email.required' => 'پر کردن این فیلد اجباری است',
            'whatsapp.required' => 'پر کردن این فیلد اجباری است',
        ];
    }
}
