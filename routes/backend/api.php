<?php

use App\Http\Controllers\Backend\API\AdminController;
use App\Http\Controllers\Backend\API\ChapterController;
use App\Http\Controllers\Backend\API\CourseController;
use App\Http\Controllers\Backend\API\CourseOfflineController;
use App\Http\Controllers\Backend\API\CourseTypeController;
use App\Http\Controllers\Backend\API\LessonController;
use App\Http\Controllers\Backend\API\NewsController;
use App\Http\Controllers\Backend\API\TeacherController;
use App\Http\Controllers\Backend\API\UserController;
use App\Http\Controllers\Backend\API\UploadImageController;

Route::apiResource('/users',UserController::class);
Route::get('/teachers/{slug}/courses',[TeacherController::class,'getTeacherCourses'])->name('teachers.courses');
Route::apiResource('/teachers', TeacherController::class)->parameters([
    'teachers' => 'teachers:slug'
]);
Route::apiResource('/admins', AdminController::class);
Route::apiResource('/course-types', CourseTypeController::class)
    ->parameters([
        'course_type' => 'course_type:slug'
]);
Route::get('/courses/newest',[CourseController::class,'getNewestCourses']);
Route::apiResource('/courses', CourseController::class)
    ->parameters([
    'courses' => 'courses:slug'
]);
Route::apiResource('/courses-offline', CourseOfflineController::class);
Route::get('courses/{courses}/courses-offline/',[CourseOfflineController::class,'getByCourse'])->name('course.course-offline');
Route::apiResource('/chapters', ChapterController::class);
Route::get('courses/{courses}/chapters/',[ChapterController::class,'getByCourse'])->name('course.chapters');
Route::apiResource('/lessons', LessonController::class);
Route::get('chapters/{id}/lessons/',[LessonController::class,'getByCourse'])->name('chapters.lessons');
Route::apiResource('/news', NewsController::class)
    ->parameters([
        'news' => 'news:slug'
]);
Route::get('upload_image', [UploadImageController::class,'index']);
Route::post('upload_image', [UploadImageController::class,'store'])->name('upload_image');
