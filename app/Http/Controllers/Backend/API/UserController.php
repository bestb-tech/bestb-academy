<?php

namespace App\Http\Controllers\Backend\API;

use App\Http\Controllers\Backend\Helpers;
use App\Http\Controllers\Controller;
use App\Http\Requests\Backend\UserRequest;
use App\Http\Resources\Resource;
use App\Models\User;
use Exception;
use Hash;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Illuminate\Http\Response;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return AnonymousResourceCollection
     */
    public function index()
    {
        return Resource::collection(User::paginate(10));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param UserRequest $request
     * @return Resource|JsonResponse
     */
    public function store(UserRequest $request)
    {
        try{
            $request->validated();
            return new Resource(User::create(
                $request->all(['user_name','full_name','email','phone_number'])+[
                    'password' => Hash::make($request->get('password')),
                    'avatar' => Helpers::saveImage(null,$request->file('avatar'),'avatar/user')
                ]));
        }catch(Exception $ex){
            return response()->json([
                'error' => $ex->getMessage()
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
        return new Resource(User::findOrFail($id));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param  int  $id
     * @return Resource|JsonResponse
     */
    public function update(UserRequest $request, $id)
    {
        try{
                $a = $request;
            $request->validated();
            $user = User::findOrFail($id);
            $user->update(
                    $request->all(['user_name','full_name','email'])+[
                        'password' => Hash::make($request->get('password')),
                        'avatar' => Helpers::saveImage($user->avatar,$request->file('avatar'),'avatar/user')
                    ]);
            return new Resource($user->fresh());
        }catch(Exception $ex){
            return response()->json([
                'error' => $ex->getMessage()
            ],JsonResponse::HTTP_BAD_REQUEST);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response|JsonResponse
     */
    public function destroy($id)
    {
        try{
            User::findOrFail($id)->delete();
            return response()->json([
                'success' => 'Xoa user thành công'
            ]);
        }catch(Exception $exception){
            return response()->json([
                'error' => $exception->getMessage()
            ],JsonResponse::HTTP_BAD_REQUEST);
        }
    }
}
