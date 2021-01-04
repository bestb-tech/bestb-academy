<?php

namespace App\Http\Requests\Backend;

use Illuminate\Foundation\Http\FormRequest;

class ContactFormRequest extends TraitRequest
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
            'name' => 'required',
            'email' => 'required|email',
            'phone' => 'required|regex:/[0-9]+/',
            'content' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Chưa nhập họ tên',
            'email.required' => 'Chưa nhập email',
            'email.email' => 'Email không đúng định dạng',
            'phone.required' => 'Chưa nhập số điện thoại',
            'phone.regex' => 'Số điện thoại không hợp lệ',
            'content.required' => 'Chưa nhập nội dung',
        ];
    }
}
