<?php

namespace App\Http\Controllers\Backend\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\Backend\ChapterRequest;
use App\Http\Requests\Backend\LessonRequest;
use App\Http\Resources\Resource;
use App\Models\Chapter;
use App\Models\Lesson;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class LessonController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return AnonymousResourceCollection
     */
    public function index()
    {
        return Resource::collection(Lesson::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param LessonRequest $request
     * @return Resource
     */
    public function store(LessonRequest $request)
    {
        try{
            $lesson = Lesson::create($request->all());
            return new Resource($lesson);
        }catch(Exception $exception){
            return new Resource([
                'error' => $exception->getMessage()
            ]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Resource
     */
    public function show($id)
    {
        return new Resource(Lesson::findOrFail($id));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param LessonRequest $request
     * @param int $id
     * @return Resource
     */
    public function update(LessonRequest $request, $id)
    {
        try{
            $request->validated();
            $lesson = Lesson::findOrFail($id);
            $lesson->update($request->all());
            return new Resource($lesson->fresh());
        }catch(Exception $exception){
            return new Resource([
                'error' => $exception->getMessage()
            ]);
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Resource
     */
    public function destroy($id)
    {
        try{
            Lesson::findOrFail($id)->delete();
            return new Resource([
                'msg' => 'Xóa bài học thành công'
            ]);
        }catch(Exception $exception){
            return new Resource([
                'error' => $exception->getMessage()
            ]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param $id
     * @return AnonymousResourceCollection
     */
    public function getByCourse($id){
        $chapter = Chapter::findOrFail($id);
        return Resource::collection($chapter->lessons()->orderBy('index')->get());
    }
}
