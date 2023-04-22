<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Translatable\HasTranslations;
use Spatie\EloquentSortable\Sortable;
use Spatie\EloquentSortable\SortableTrait;
class Section extends Model implements Sortable
{
    use HasFactory;
    use SoftDeletes;
    use HasTranslations;
    use SortableTrait;

    public $sortable = [
        'order_column_name' => 'order',
        'sort_when_creating' => true,
    ];

    public $translatable = ['name', 'description'];


    protected $fillable = ['name', 'description', 'course_id', 'parent_id','active'];

    protected $dates = ['deleted_at'];

    public function course()
    {
        return $this->belongsTo(Course::class);
    }

    public function parent()
    {
        return $this->belongsTo(Section::class, 'parent_id');
    }

    public function children()
    {
        return $this->hasMany(Section::class, 'parent_id');
    }

    public function lessons()
    {
        return $this->hasMany(Lesson::class);
    }
}
