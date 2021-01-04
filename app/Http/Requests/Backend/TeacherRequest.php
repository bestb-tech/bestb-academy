<?php

namespace App\Http\Requests\Backend;

use App\Models\Teacher;
use Illuminate\Foundation\Http\FormRequest;

class TeacherRequest extends TraitRequest
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
        $id = null;

        if($this->method() === 'PUT'){
            $id = Teacher::whereSlug($this->route('teachers'))->firstOrFail()->id;
        };
        return [
            'user_name'=>'required|max:25|unique:teachers,user_name,'.$id,
            'full_name'=>'required|max:30',
            'password'=>'required',
            'email'=>'required|email|unique:teachers,email,'.$id,
            'phone_number'=>'nullable|regex:/[0-9]+/|unique:teachers,phone_number,'.$id,
            'avatar'=>'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ];
    }

    public function messages()
    {
        return [
            'user_name.required' => 'Chưa nhập user name',
            'user_name.max' => 'User name quá dài (25 ký tự)',
            'user_name.unique' => 'User name đã sử dụng',
            'full_name.required' => 'Chưa nhập họ tên',
            'full_name.max' => 'Họ tên quá dài (30 ký tự)',
            'password.required' => 'Chưa nhập password',
            'email.required' => 'Chưa nhập email',
            'email.email' => 'Email không hợp lệ',
            'email.unique' => 'Email đã được sử dụng',
            'phone_number.regex' => 'Số điện thoại không hợp lệ',
            'phone_number.unique' => 'Số điện thoại đã được sử dụng',
            'avatar.image' => 'Ảnh không đúng định dạng',
            'avatar.mimes' => 'Ảnh không hợp lệ',
            'avatar.max' => 'File quá lớn (< 2MB)',
        ];
    }
}
