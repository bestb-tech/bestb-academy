<?php

namespace App\Http\Requests\Backend;

use App\Models\Course;
use Illuminate\Foundation\Http\FormRequest;

class CourseRequest extends TraitRequest
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
        $required_add = 'required';
        if($this->method() === 'PUT'){
            $id = Course::whereSlug($this->route('courses'))->firstOrFail()->id;
            $required_add = 'nullable';
        }
        return [
            'name'=>'required|unique:courses,name,'.$id,
            'course_type_id' =>'required|exists:course_type,id',
            'base_price' => 'nullable|regex:/[0-9]+/',
            'sell_price' => 'nullable|regex:/[0-9]+/',
            'certificate_name' => 'required',
            'certificate_img_url'=>$required_add.'|image|mimes:jpeg,png,jpg,gif|max:20480',
            'pass_point' => 'required|regex:/[0-9]+/',
            'release_at' => 'date',
            'status' => 'nullable|regex:/[0-9]+/',
            'teacher_id' => 'required|regex:/[0-9]+/|exists:teachers,id',
            'img' => $required_add.'|image|mimes:jpeg,png,jpg,gif|max:20480'
        ];
    }

    public function messages()
    {
        return [
            "name.required" => "Chưa nhập tên khóa học",
            "name.unique" => "Tên đã sử dụng",
            "course_type_id.required" => "Chưa chọn loại khóa học",
            "course_type_id.exists" => "Mã khóa học không tồn tại",
            "base_price.regex" => "Giá cơ bản không hợp lệ",
            "sell_price.regex" => "Giá bán không hợp lệ",
            "certificate_name.required" => "Chưa nhập tên bằng cấp",
            "certificate_img_url.required" => "Chưa nhập mẫu bằng cấp",
            "certificate_img_url.image" => "Mẫu bằng cấp không hợp lệ",
            "certificate_img_url.mimes" => "Mẫu bằng cấp không hợp lệ",
            "certificate_img_url.max" => "File quá lớn (<20MB)",
            "pass_point.required" => "Chưa nhập điểm sàn",
            "pass_point.regex" => "Điểm không hơp lệ",
            "release_at.date" => "Chưa nhập ngày khai giảng",
            "status.regex" => "Trạng thái không hơp lệ",
            "teacher_id.required" => "Chưa chọn giảng viên",
            "teacher_id.regex" => "ID giảng viên không hợp lệ",
            "teacher_id.exists" => "Giảng viên không tồn tại",
            "img.image" => "Ảnh khóa học không hợp lệ",
            "img.mimes" => "Ảnh khóa học không hợp lệ",
            "img.max" => "File quá lớn (<20MB)",
        ];

    }
}
