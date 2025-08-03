<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Classes extends Model
{
    use hasFactory;
    protected $fillable = ['name', 'subject_ids', 'is_deleted'];
    public function subjects()
{
    return $this->belongsToMany(Subjects::class, 'class_subject');
}

}
