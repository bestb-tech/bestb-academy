<?php

namespace App\Http\Controllers\Backend\API;

use App\Http\Controllers\Backend\Helpers;
use App\Http\Controllers\Controller;
use App\Http\Requests\Backend\TeacherRequest;
use App\Http\Resources\Resource;
use App\Models\Teacher;
use App\Models\User;
use Cviebrock\EloquentSluggable\Services\SlugService;
use Exception;
use Hash;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

/**
 * Class TeacherController
 * @package App\Http\Controllers\Backend\API
 */
class TeacherController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return AnonymousResourceCollection
     */
    public function index()
    {
        return Resource::collection(Teacher::paginate(10));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return Resource|JsonResponse
     */
    public function store(TeacherRequest $request)
    {
        try{
            $a = $request;
            $request->validated();
            $teacher = Teacher::create(
                $request->all('user_name','full_name','email','phone_number','description')+[
                    'password' => Hash::make($request->get('password')),
                    'avatar' => Helpers::saveImage(null,$request->file('avatar'),'avatar/teachers'),
                    'slug' => SlugService::createSlug(Teacher::class,'slug',$request->get('full_name')),
                ]
            );
            return new Resource($teacher);
        }catch(Exception $exception){
            return response()->json([
                'error' => $exception->getMessage()
            ],JsonResponse::HTTP_BAD_REQUEST);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Resource
     */
    public function show($slug)
    {
        return new Resource(Teacher::whereSlug($slug)->firstOrFail());
    }

    /**
     * Update the specified resource in storage.
     *
     * @param TeacherRequest $request
     * @param $slug
     * @return Resource|JsonResponse
     */
    public function update(TeacherRequest $request, $slug)
    {
        try{
            $request->validated();
            $teacher = Teacher::whereSlug($slug)->firstOrFail();
            $teacher->update(
                $request->all('user_name','full_name','email','phone_number','description')+[
                    'password' => Hash::make($request->get('password')),
                    'slug' => SlugService::createSlug(Teacher::class,'slug',$request->get('full_name'))
                ] + ($request->hasFile('avatar') ? [
                    'avatar' => Helpers::saveImage(null,$request->file('avatar'),'avatar/teachers'),
                ]:[])
            );
            return new Resource($teacher->fresh());
        }catch(Exception $exception){
            return response()->json([
                'error' => $exception->getMessage()
            ],JsonResponse::HTTP_BAD_REQUEST);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return JsonResponse|
     */
    public function destroy($slug)
    {
        try{
            Teacher::whereSlug($slug)->firstOrFail()->delete();
            return response()->json([
                'success' => 'Xoa giảng viên thành công'
            ]);
        }catch(Exception $exception){
            return response()->json([
                'error' => $exception->getMessage()
            ],JsonResponse::HTTP_BAD_REQUEST);
        }
    }

    /**
     * get all courses of 1 teacher by slug
     *
     * @param $slug
     * @return AnonymousResourceCollection
     */
    public function getTeacherCourses($slug){
        $teacher = Teacher::whereSlug($slug)->firstOrFail();
        return Resource::collection($teacher->courses);
    }
}
