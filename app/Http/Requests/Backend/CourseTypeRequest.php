<?php

namespace App\Http\Requests\Backend;

use Illuminate\Foundation\Http\FormRequest;

class CourseTypeRequest extends TraitRequest
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
            'name' => 'required|unique:course_type,name,'.$this->route('course_type'),
            'parent_id' => 'nullable|regex:/[0-9]+/|exists:course_type,id'
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Chưa nhập tên',
            'name.unique' => 'Trùng tên',
            'parent_id.regex' => 'ID cha không hợp lệ',
            'parent_id.exists' => 'ID cha không tồn tại'
        ];
    }
}
