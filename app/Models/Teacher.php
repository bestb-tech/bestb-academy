<?php

namespace App\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Teacher
 *
 * @property int $id
 * @property string $user_name
 * @property string $full_name
 * @property string $slug
 * @property string $password
 * @property string $email
 * @property string|null $email_verified_at
 * @property string|null $phone_number
 * @property string|null $avatar
 * @property string|null $description
 * @property string|null $remember_token
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Course[] $courses
 * @property-read int|null $courses_count
 * @method static \Illuminate\Database\Eloquent\Builder|Teacher findSimilarSlugs(string $attribute, array $config, string $slug)
 * @method static \Illuminate\Database\Eloquent\Builder|Teacher newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Teacher newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Teacher query()
 * @method static \Illuminate\Database\Eloquent\Builder|Teacher whereAvatar($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Teacher whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Teacher whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Teacher whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Teacher whereEmailVerifiedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Teacher whereFullName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Teacher whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Teacher wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Teacher wherePhoneNumber($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Teacher whereRememberToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Teacher whereSlug($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Teacher whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Teacher whereUserName($value)
 * @mixin \Eloquent
 */
class Teacher extends Model
{
    use HasFactory,Sluggable;

    protected $table = 'teachers';

    protected $fillable = ['user_name','full_name','slug','password','email','phone_number','avatar','description'];
    protected $hidden = ['avatar'];
    protected $appends = ['pathAvatar'];

    public function courses(){
        return $this->belongsToMany(Course::class,'teachers_courses','teacher_id','course_id');
    }

    public function getPathAvatarAttribute(){
        $src = $this->avatar ?? 'unnamed.png';
        return '/storage/avatar/teachers/'.$src;
    }

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'full_name',
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
