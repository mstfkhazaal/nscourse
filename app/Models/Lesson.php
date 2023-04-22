<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Translatable\HasTranslations;

/**
 * @method static upsert(array[] $array, string[] $array1)
 */
class Lesson extends Model
{
    use HasFactory;
    use SoftDeletes;
    use HasTranslations;

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
