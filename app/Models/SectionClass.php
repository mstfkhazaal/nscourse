<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\EloquentSortable\Sortable;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class SectionClass extends Model  implements  HasMedia
{
    use HasFactory;
    use SoftDeletes;
    use InteractsWithMedia;
    protected $fillable = ['name','classs_id', 'active'];

   public function classs()
    {
        return $this->belongsTo(Classs::class);
    }
     public function students()
    {
        return $this->hasMany(Student::class);
    }
}
