<?php

namespace App\Http\Controllers\Backend\API;

use App\Http\Controllers\Backend\Helpers;
use App\Http\Controllers\Controller;
use App\Http\Requests\Backend\CourseRequest;
use App\Http\Resources\Resource;
use App\Models\Course;
use App\Models\Teacher;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;

class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return AnonymousResourceCollection
     */
    public function index()
    {
        return Resource::collection(Course::paginate(10));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param CourseRequest $request
     * @return Resource
     * @throws \Throwable
     */
    public function store(CourseRequest $request)
    {
        DB::beginTransaction();
        try{
            $request->validated();
            $course = Course::create(
                $request->except(['certificate_img_url','img'])+[
                    'certificate_img_url' => Helpers::saveImage(null,$request->file('certificate_img_url'),'course/certificate/img'),
                    'img' => Helpers::saveImage(null,$request->file('img'),'course/img/')
                ]);
            Teacher::findOrFail($request->get('teacher_id'))->courses()->save($course);
            DB::commit();
            return new Resource($course);
        }catch(Exception $exception){
            DB::rollBack();
            return new Resource([
                'error' => $exception->getMessage()
            ]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $slug
     * @return Resource
     */
    public function show($slug)
    {
        return new Resource(Course::whereSlug($slug)->firstOrFail());
    }

    /**
     * Update the specified resource in storage.
     *
     * @param CourseRequest $request
     * @param $slug
     * @return Resource
     */
    public function update(CourseRequest $request, $slug)
    {
        $request->validated();
        $course = Course::whereSlug($slug)->firstOrFail();
        $course->update(
            $request->except(['certificate_img_url','img'])
            +($request->hasFile('certificate_img_url') ?
                    ['certificate_img_url' => Helpers::saveImage($course->certificate_img_url,$request->file('certificate_img_url'),'course/certificate/img')] : [])
            + ($request->hasFile('img') ? [
                    'img' => Helpers::saveImage($course->img,$request->file('img'),'course/img/')]:[])
        );
        return new Resource($course->fresh());
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param $slug
     * @return \Illuminate\Http\Response
     * @throws Exception
     */
    public function destroy($slug)
    {
        return Course::whereSlug($slug)->firstOrFail()->delete();
    }

    /**
     *  get newest courses
     *
     */
    public function getNewestCourses(){
        return Resource::collection(Course::orderBy('release_at','desc')->take(3)->get());
    }
}
