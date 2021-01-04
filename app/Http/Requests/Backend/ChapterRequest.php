<?php

namespace App\Http\Requests\Backend;

use App\Models\Chapter;
use App\Models\Course;
use App\Models\CoursesOffline;
use App\Models\Lesson;
use Exception;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Http\JsonResponse;

class ChapterRequest extends TraitRequest
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
        $array_index = '-1';
        $this_model_index = '-1';
        try{
            if($this->method() == 'PUT'){
                $this_model_index = Chapter::findOrFail($this->route('chapter'))->index;
            }
            $array_index = implode(',',Course::findOrFail($this->get('course_id'))->chapters->where('index','<>',$this_model_index)->pluck('index')->toArray());
        }catch(ModelNotFoundException $exception){
            throw new HttpResponseException(
                response()->json(['errors' => ['course_id' => 'Mã khóa học không đúng']],JsonResponse::HTTP_UNPROCESSABLE_ENTITY)
            );
        }finally{
            $a = $array_index;
            return [
                    'name' => 'required',
                'index' => 'required|numeric|min:0|not_in:'.$array_index,
                'course_id' => 'required|exists:courses,id'
            ];
        }


    }

    public function messages()
    {
        return [
            "name.required" => "Chưa nhập tên chương học",
            "index.required" => "Chưa nhập số thứ tự chương",
            "index.numeric" => "Số thứ tự chương không hợp lệ",
            "index.min" => "Số thứ tự chương không hợp lệ",
            "index.not_in" => "Trùng số thứ tự chương",
            "course_id.required" => "Chưa chọn khóa học",
            "course_id.exists" => "Khóa học không tồn tại",
        ];
    }
}
