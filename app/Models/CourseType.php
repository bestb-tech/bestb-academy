<?php

namespace App\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use PhpParser\Builder;

/**
 * App\Models\CourseType
 *
 * @property int $id
 * @property string $name
 * @property string $slug
 * @property string|null $description
 * @property int|null $parent_id
 * @property-read \Illuminate\Database\Eloquent\Collection|CourseType[] $courseChildren
 * @property-read int|null $course_children_count
 * @property-read CourseType|null $courseParent
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Course[] $courses
 * @property-read int|null $courses_count
 * @method static \Illuminate\Database\Eloquent\Builder|CourseType findSimilarSlugs(string $attribute, array $config, string $slug)
 * @method static \Illuminate\Database\Eloquent\Builder|CourseType newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|CourseType newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|CourseType query()
 * @method static \Illuminate\Database\Eloquent\Builder|CourseType whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CourseType whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CourseType whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CourseType whereParentId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CourseType whereSlug($value)
 * @mixin \Eloquent
 */
class CourseType extends Model
{
    use HasFactory,Sluggable;

    protected $table = 'course_type';
    public $timestamps = false;
    protected $fillable = ['name','description','parent_id
    '];
    protected $with = ['courseTypeChildren'];
    public function courses(){
        return $this->hasMany(Course::class,'course_type_id','id');
    }

    public function courseTypeParent(){
        return $this->belongsTo(CourseType::class,'parent_id','id');
    }

    public function courseTypeChildren(){
        return $this->hasMany(CourseType::class,'parent_id','id');
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

    public function scopeParentCourseType($query){
        return $query->whereNull('parent_id');
    }
}
