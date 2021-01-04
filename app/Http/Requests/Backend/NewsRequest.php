<?php

namespace App\Http\Requests\Backend;

use Illuminate\Foundation\Http\FormRequest;

class NewsRequest extends TraitRequest
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
        $rule_thumbnail = ($this->method() == "PUT") ? 'nullable' : 'required';
        return [
            'thumbnail' => $rule_thumbnail.'|image|mimes:jpeg,png,jpg,gif|max:20480',
            'name' => 'required',
            'content'=>'required',
            'view_count' => 'nullable|numeric|min:0',
        ];
    }

    public function messages()
    {
        return [
            "thumbnail.required" => "Chưa chọn ảnh tiêu đề bài viết",
            "thumbnail.image" => "Ảnh tiêu đề không đúng định dạng",
            "thumbnail.mimes" => "Ảnh tiêu đề không đúng định dạng",
            "thumbnail.max" => "Ảnh tiêu đề quá lớn (<20 MB)",
            "name.required" => "Chưa nhập tên tin tức",
            "content.required" => "Chưa nhập nội dung tin tức",
            "view_count.numeric" => "Định dạng lượt xem không hợp lệ",
            "view_count.min" => "Số lượng lượt xem không hợp lệ",
        ];
    }
}
