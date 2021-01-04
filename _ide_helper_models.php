<?php

// @formatter:off
/**
 * A helper file for your Eloquent Models
 * Copy the phpDocs from this file to the correct Model,
 * And remove them from this file, to prevent double declarations.
 *
 * @author Barry vd. Heuvel <barryvdh@gmail.com>
 */


namespace App\Models{
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
 * @property string|null $google_form_url
 * @property string|null $google_sheet_url
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Chapter[] $chapters
 * @property-read int|null $chapters_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\CoursesOffline[] $courseOffline
 * @property-read int|null $course_offline_count
 * @property-read mixed $path_img
 * @property-read mixed $path_index
 * @method static \Illuminate\Database\Eloquent\Builder|Course whereGoogleFormUrl($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Course whereGoogleSheetUrl($value)
 */
	class Course extends \Eloquent {}
}

