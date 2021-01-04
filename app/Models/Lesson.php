<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Lesson
 *
 * @property int $id
 * @property string|null $video_url
 * @property string $name
 * @property string|null $description
 * @property int $index
 * @property int $chapter_id
 * @property-read \App\Models\Chapter $chapter
 * @method static \Illuminate\Database\Eloquent\Builder|Lesson newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Lesson newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Lesson query()
 * @method static \Illuminate\Database\Eloquent\Builder|Lesson whereChapterId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Lesson whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Lesson whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Lesson whereIndex($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Lesson whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Lesson whereVideoUrl($value)
 * @mixin \Eloquent
 */
class Lesson extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $fillable = ['video_url','name','description','index','chapter_id'];

    public function chapter(){
        return $this->belongsTo(Chapter::class,'chapter_id','id');
    }
}
