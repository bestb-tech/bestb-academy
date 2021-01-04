<?php

namespace App\Models;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

/**
 * App\Models\Course
 *
 * @mixin Builder
 * @property int $id
 * @property string $name
 * @property string $slug
 * @property int $course_type_id
 * @property string|null $description
 * @property string|null $short_description
 * @property int $base_price
 * @property int $sell_price
 * @property string $certificate_name
 * @property string $certificate_img_url
 * @property int $pass_point
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property string $release_at
 * @property int $status 1:Đang học, 2: Mở đăng kí, 3:Lớp đầy
 * @property-read CourseType $courseType
 * @property-read Collection|Teacher[] $teachers
 * @property-read int|null $teachers_count
 * @property-read Collection|User[] $users
 * @property-read int|null $users_count
 * @property-read Collection|UserInCourse[] $usersInCourses
 * @property-read int|null $users_in_courses_count
 * @method static Builder|Course newModelQuery()
 * @method static Builder|Course newQuery()
 * @method static Builder|Course query()
 * @method static Builder|Course whereBasePrice($value)
 * @method static Builder|Course whereCertificateImgUrl($value)
 * @method static Builder|Course whereCertificateName($value)
 * @method static Builder|Course whereCourseTypeId($value)
 * @method static Builder|Course whereCreatedAt($value)
 * @method static Builder|Course whereDescription($value)
 * @method static Builder|Course whereId($value)
 * @method static Builder|Course whereName($value)
 * @method static Builder|Course wherePassPoint($value)
 * @method static Builder|Course whereReleaseAt($value)
 * @method static Builder|Course whereSellPrice($value)
 * @method static Builder|Course whereShortDescription($value)
 * @method static Builder|Course whereSlug($value)
 * @method static Builder|Course whereStatus($value)
 * @method static Builder|Course whereUpdatedAt($value)
 * @property string $img
 * @method static Builder|Course findSimilarSlugs(string $attribute, array $config, string $slug)
 * @method static Builder|Course whereImg($value)
 */
class Course extends Model
{
    use HasFactory,Sluggable;

    protected $table = 'courses';
    protected $with  = ['teachers','courseType'];
    protected $appends =['pathImg','total_chapter','total_lesson','path_certificate_img'];
//    protected $hidden = ['img'];
    protected $fillable = [
        'name',
        'course_type_id',
        'description',
        'short_description',
        'base_price',
        'sell_price',
        'img',
        'certificate_name',
        'certificate_img_url',
        'pass_point',
        'release_at',
        'status',
        'google_form_url',
        'google_sheet_url'
    ];


    public function usersInCourses(){
        return $this->hasMany(UserInCourse::class,'course_id','id');
    }

    public function teachers(){
        return $this->belongsToMany(Teacher::class,'teachers_courses','course_id','teacher_id');
    }

    public function courseType(){
        return $this->belongsTo(CourseType::class,'course_type_id','id');
    }

    public function users(){
        return $this->belongsToMany(User::class,'users_courses','course_id','user_id');
    }

    public function courseOffline(){
        return $this->hasMany(CoursesOffline::class,'course_id','id');
    }

    public function chapters(){
        return $this->hasMany(Chapter::class,'course_id','id');
    }

    public function getTotalChapterAttribute(){
        return count($this->chapters);
    }

    public function getTotalLessonAttribute(){
        $count = 0;
        foreach($this->chapters as $chapter){
            $count += count($chapter->lessons);
        }
        return $count;
    }

    public function getPathImgAttribute(){
        $data = '/storage/course/img/'.$this->img;
        $this->attributes['pathImg'] = $data;
        return $data;
    }

    public function getPathCertificateImgAttribute(){
        return '/storage/course/certificate/img/'.$this->certificate_img_url;
    }

    public function getPathIndexAttribute(){

    }

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'name',
                'maxLength' => 25,
                'maxLengthKeepWords' => true,
                'method' => null,
                'separator' => '-',
                'unique' => true,
                'uniqueSuffix' => null,
                'includeTrashed' => false,
                'reserved' => null,
                'onUpdate' => true,
            ]
        ];
    }
}
