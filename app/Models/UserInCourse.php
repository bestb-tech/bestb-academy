<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserInCourse extends Model
{
    use HasFactory;

    protected $table = 'users_courses';

    public function payCourses(){
        return $this->hasMany(PaidCourse::class,'user_course_id','id');
    }

    public function user(){
        return $this->belongsTo(User::class,'user_id','id');
    }

    public function course(){
        return $this->belongsTo(Course::class,'course_id','id');
    }
}
