<?php

namespace App\Http\Controllers\Backend\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\Backend\CourseTypeRequest;
use App\Http\Resources\Resource;
use App\Models\CourseType;
use Cviebrock\EloquentSluggable\Services\SlugService;
use Exception;
use Illuminate\Http\Request;

class CourseTypeController extends Controller
{

    public function index()
    {
        return Resource::collection(CourseType::whereNull('parent_id')->get());
    }

    public function store(CourseTypeRequest $request)
    {
        $request->validated();
        $courseType = CourseType::create($request->all());
        return new Resource($courseType);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Resource
     */
    public function show($slug)
    {
        return new Resource(CourseType::with('courses')->whereSlug($slug)->firstOrFail());
    }

    /**
     * Update the specified resource in storage.
     *
     * @param CourseTypeRequest $request
     * @param int $id
     * @return Resource
     */
    public function update(CourseTypeRequest $request, $id)
    {
        $request->validated();
        $courseType = CourseType::findOrFail($id);
        $courseType->update($request->all());
        return new Resource($courseType->fresh());
    }

    /**
     * Xóa khóa học
     *
     * @param  int  $id
     * @return Resource
     */
    public function destroy($id)
    {
        CourseType::findOrFail($id)->delete();
        return new Resource([
            'success' => 'Xoa loại khóa học thành công'
        ]);
    }
}
