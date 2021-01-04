<?php

namespace App\Http\Requests\Backend;

use App\Models\Chapter;
use App\Models\Lesson;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Http\JsonResponse;

class LessonRequest extends TraitRequest
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
                $this_model_index = Lesson::findOrFail($this->route('lesson'))->index;
            }
            $array_index = implode(',',Chapter::findOrFail($this->get('chapter_id'))->lessons->where('index','<>',$this_model_index)->pluck('index')->toArray());
        }catch(ModelNotFoundException $exception){
            throw new HttpResponseException(
                response()->json(['errors' => ['chapter_id' => 'Mã chương học không đúng']],JsonResponse::HTTP_UNPROCESSABLE_ENTITY)
            );
        }finally{
            $a = $array_index;
            return [
                'video_url' => 'nullable|url',
                'name' => 'required',
                'index' => 'required|numeric|min:0|not_in:'.$array_index,
                'chapter_id' => 'required|exists:chapters,id'
            ];
        }
    }

    public function messages()
    {
        return [
            "video_url.url" => "Link video không hợp lệ",
            "name.required" => "Chưa nhập tên bài học",
            "index.required" => "Chưa chọn thứ tự bài học",
            "index.numeric" => "Thứ tự bài học không hợp lệ",
            "index.min" => "Thứ tự bài học không hợp lệ",
            "index.not_in" => "Trùng thứ tự bài học",
            "chapter_id.required" => "Chưa chọn chương học",
            "chapter_id.exists" => "Chương học không hợp  lệ",

        ];
    }
}
