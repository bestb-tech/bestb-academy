<?php

namespace App\Http\Requests\Backend;

use Illuminate\Foundation\Http\FormRequest;

class CourseOfflineRequest extends TraitRequest
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
            'date' => 'required|date',
            'location' => 'required',
            'limit_student' => 'numeric|min:1',
            'joined_student' => 'numeric|min:0',
            'lesson_time' => 'date_format: "H:i"',
            'course_id' => 'required|exists:courses,id'
        ];
    }

    public function messages()
    {
        return [
            "date.required" => "Chưa nhập ngày học",
            "date.date" => "Ngày học không đúng định dạng",
            "location.required" => "Chưa nhập địa điểm học",
            "limit_student.min" => "Số lượng học viên tối đa không hợp lệ",
            "joined_student.min" => "Số lượng học viên đã tham gia không hợp lệ",
            "limit_student.numeric" => "Số lượng học viên tối đa không hợp lệ",
            "joined_student.numeric" => "Số lượng học viên đã tham gia không hợp lệ",
            "lesson_time.date_format" => "Định dạng thời lượng học không hợp lệ",
            "course_id.required" => "Chưa chọn khóa học chính",
            "course_id.exists" => "Mã khóa học không tồn tại",

        ];
    }
}
