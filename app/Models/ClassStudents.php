<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClassStudents extends Model
{
    use hasFactory;
    protected $fillable = ['class_id','student_id'];

       public function class()
    {
        return $this->belongsTo(Classes::class, 'class_id');
    }

    public function student()
    {
        return $this->belongsTo(Students::class, 'student_id');
    }
}
