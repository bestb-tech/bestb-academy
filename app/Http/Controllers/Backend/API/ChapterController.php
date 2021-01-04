<?php

namespace App\Http\Controllers\Backend\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\Backend\ChapterRequest;
use App\Http\Requests\Backend\CourseOfflineRequest;
use App\Http\Resources\Resource;
use App\Models\Chapter;
use App\Models\Course;
use App\Models\CoursesOffline;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class ChapterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return AnonymousResourceCollection
     */
    public function index()
    {
        return Resource::collection(Chapter::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param ChapterRequest $request
     * @return Resource
     */
    public function store(ChapterRequest $request)
    {
        try{
            $chapter = Chapter::create($request->all());
            return new Resource($chapter);
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
        return new Resource(Chapter::findOrFail($id));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param ChapterRequest $request
     * @param int $id
     * @return Resource
     */
    public function update(ChapterRequest $request, $id)
    {
        try{
            $request->validated();
            $chapter = Chapter::findOrFail($id);
            $chapter->update($request->all());
            return new Resource($chapter->fresh());
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
            Chapter::findOrFail($id)->delete();
            return new Resource([
                'msg' => 'Xóa lớp chương học thành công'
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
     * @param $courses
     * @return AnonymousResourceCollection
     */
    public function getByCourse($courses){
        $course = Course::whereSlug($courses)->firstOrFail();
        return Resource::collection($course->chapters()->orderBy('index')->get());
    }
}
