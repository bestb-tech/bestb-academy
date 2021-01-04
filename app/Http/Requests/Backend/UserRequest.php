<?php

namespace App\Http\Requests\Backend;


class UserRequest extends TraitRequest
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
        $a = $this;
        return [
            'user_name' => 'required|max:25',
            'full_name' => 'required|max:30',
            'password' => 'required',
            'email' => 'required|email|unique:users,email,'.$this->route('user'),
            'phone_number' => 'nullable|regex:/[0-9]+/|unique:users,phone_number,'.$this->route('user'),
            'avatar' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
        ];
    }

    public function messages()
    {
        return [
            'user_name.required'    => 'Chưa nhập tên đăng nhập',
            'user_name.max'    => 'Tên quá dài (25 ký tự)',
            'full_name.required'    => 'Chưa nhập họ tên',
            'full_name.max'    => 'Tên quá dài (30 ký tự)',
            'password.required'    => 'Chưa nhập password',
            'email.required'    => 'Chưa nhập username',
            'email.email'    => 'Email không hợp lệ',
            'email.unique'    => 'Email đã sử dụng',
            'phone_number.regex'    => 'Số điện thoại không hợp lệ',
            'avatar.image'    => 'Ảnh đại diện không hợp lệ',
            'avatar.mimes'    => 'Ảnh đại diện không hợp lệ',
            'avatar.max'    => 'File quá lớn (< 2MB)',

        ];
    }
}
