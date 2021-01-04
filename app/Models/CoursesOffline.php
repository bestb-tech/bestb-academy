<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\CoursesOffline
 *
 * @property int $id
 * @property string $date
 * @property string $location
 * @property int|null $limit_student
 * @property int|null $joined_student
 * @property string|null $lesson_time
 * @property int $course_id
 * @property-read \App\Models\Course $course
 * @method static \Illuminate\Database\Eloquent\Builder|CoursesOffline newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|CoursesOffline newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|CoursesOffline query()
 * @method static \Illuminate\Database\Eloquent\Builder|CoursesOffline whereCourseId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CoursesOffline whereDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CoursesOffline whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CoursesOffline whereJoinedStudent($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CoursesOffline whereLessonTime($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CoursesOffline whereLimitStudent($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CoursesOffline whereLocation($value)
 * @mixin \Eloquent
 */
class CoursesOffline extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $fillable = ['date','location','limit_student','joined_student','lesson_time','course_id'];

    public function course(){
        return $this->belongsTo(Course::class,'course_id','id');
    }
}
