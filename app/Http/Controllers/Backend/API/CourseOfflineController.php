<?php

namespace App\Http\Controllers\Backend\API;

use App\Http\Controllers\Backend\Helpers;
use App\Http\Controllers\Controller;
use App\Http\Requests\Backend\CourseOfflineRequest;
use App\Http\Resources\Resource;
use App\Models\Course;
use App\Models\CoursesOffline;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class CourseOfflineController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return AnonymousResourceCollection
     */
    public function index()
    {
        return Resource::collection(CoursesOffline::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param CourseOfflineRequest $request
     * @return Resource
     */
    public function store(CourseOfflineRequest $request)
    {
        try{
            $courseOffline = CoursesOffline::create($request->all());
            return new Resource($courseOffline);
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
        return new Resource(CoursesOffline::findOrFail($id));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param CourseOfflineRequest $request
     * @param int $id
     * @return Resource
     */
    public function update(CourseOfflineRequest $request, $id)
    {
        try{
            $request->validated();
            $courseOffline = CoursesOffline::findOrFail($id);
            $courseOffline->update($request->all());
            return new Resource($courseOffline->fresh());
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
            CoursesOffline::findOrFail($id)->delete();
            return new Resource([
                'msg' => 'Xóa lớp học offline thành công'
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
        return Resource::collection($course->courseOffline);
    }
}
