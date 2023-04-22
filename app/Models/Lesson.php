<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Translatable\HasTranslations;

class Lesson extends Model
{
    use HasFactory;
    use SoftDeletes;
    use HasTranslations;

    public $translatable = ['name', 'description'];



    protected $fillable = ['title', 'description', 'content', 'section_id'];

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
