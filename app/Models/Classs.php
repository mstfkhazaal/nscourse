<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Classs extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $fillable = ['name', 'active'];

    public function sectionClass()
    {
        return $this->hasMany(SectionClass::class);
    }
}
