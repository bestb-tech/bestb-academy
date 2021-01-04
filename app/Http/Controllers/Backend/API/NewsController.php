<?php

namespace App\Http\Controllers\Backend\API;

use App\Http\Controllers\Backend\Helpers;
use App\Http\Controllers\Controller;
use App\Http\Requests\Backend\NewsRequest;
use App\Http\Resources\Resource;
use App\Models\News;
use Cviebrock\EloquentSluggable\Services\SlugService;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return AnonymousResourceCollection
     */
    public function index()
    {
        return Resource::collection(News::paginate(10));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return Resource
     */
    public function store(NewsRequest $request)
    {
        try{
            $request->validated();
            $news = News::create(
                $request->except(['thumbnail'])+[
                    'thumbnail' => Helpers::saveImage(null,$request->file('thumbnail'),'news/thumb/')
                ]
            );
            return new Resource($news);
        }catch(Exception $exception){
            return new Resource([
                'error' => $exception->getMessage()
            ]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param $slug
     * @return Resource
     */
    public function show($slug)
    {
        return new Resource(News::whereSlug($slug)->firstOrFail());
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return Resource
     */
    public function update(NewsRequest $request, $slug)
    {
        try{
            $request->validated();
            $news = News::whereSlug($slug)->firstOrFail();
            $news->update(
                $request->except(['thumbnail'])+($request->hasFile('thumbnail') ?
                     ['thumbnail' => Helpers::saveImage($news->thumbnail,$request->file('thumbnail'),'news/thumb/')]:[]
                )
//                +[
//                    'slug' => SlugService::createSlug(ListNews::class,'slug',$request->get('name'))
//                ]
            );
            return new Resource($news->fresh());
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
    public function destroy($slug)
    {
        try{
            News::whereSlug($slug)->firstOrFail()->delete();
            return new Resource([
                'msg' => 'Xóa lớp tin tức thành công'
            ]);
        }catch(Exception $exception){
            return new Resource([
                'error' => $exception->getMessage()
            ]);
        }
    }
}
