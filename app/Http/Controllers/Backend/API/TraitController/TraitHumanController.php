<?php

namespace App\Http\Controllers\Backend\API\TraitController;

use App\Http\Controllers\Backend\Helpers;
use App\Http\Controllers\Controller;
use App\Http\Requests\Backend\TeacherRequest;
use App\Http\Resources\Resource;
use App\Models\Teacher;
use App\Models\User;
use Cviebrock\EloquentSluggable\Services\SlugService;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class TraitHumanController extends Controller
{
    public $modelName;
    public function getModel(){
        return 'App\Models\\'.$this->modelName;
    }
    /**
     * Display a listing of the resource.
     *
     * @return AnonymousResourceCollection
     */
    public function index()
    {
        return Resource::collection(($this->getModel())::paginate(10));
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
    public function show($id)
    {
        return new Resource(Teacher::findOrFail($id));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return Resource|JsonResponse
     */
    public function update(TeacherRequest $request, $id)
    {
        try{
            $request->validated();
            $teacher = Teacher::findOrFail($id);
            $teacher->update(
                $request->all('user_name','full_name','email','phone_number','description')+[
                    'password' => Hash::make($request->get('password')),
                    'avatar' => Helpers::saveImage(null,$request->file('avatar'),'avatar/teachers'),
                    'slug' => SlugService::createSlug(Teacher::class,'slug',$request->get('full_name'))
                ]
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
    public function destroy($id)
    {
        $model = new Teacher();
        try{
            $model::findOrFail($id)->delete();
            return response()->json([
                'success' => 'Xoa giảng viên thành công'
            ]);
        }catch(Exception $exception){
            return response()->json([
                'error' => $exception->getMessage()
            ],JsonResponse::HTTP_BAD_REQUEST);
        }
    }
}
