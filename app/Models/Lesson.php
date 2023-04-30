<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Translatable\HasTranslations;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

/**
 * @method static upsert(array[] $array, string[] $array1)
 */
class Lesson extends Model implements HasMedia
{
    use HasFactory;
    use SoftDeletes;
    use HasTranslations;
    use InteractsWithMedia;
    public $translatable = ['title', 'description'];



    protected $fillable = ['title', 'description', 'duration', 'section_id','active'];

    protected $dates = ['deleted_at'];

    public function section()
    {
        return $this->belongsTo(Section::class);
    }

    public function completedLessons()
    {
        return $this->hasMany(CompletedLesson::class);
    }
}
