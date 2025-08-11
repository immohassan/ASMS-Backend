<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AssignmentsMarks extends Model
{
    use hasFactory;
    protected $fillable = ['assignment_id', 'class_id', 'subject_id','student_id','marks_obtained', 'grade', 'remarks'];
     public function assignment()
    {
        return $this->belongsTo(Assignments::class, 'assignment_id');
    }

    // 🔹 Class relation
    public function class()
    {
        return $this->belongsTo(Classes::class, 'class_id');
    }

    // 🔹 Subject relation
    public function subject()
    {
        return $this->belongsTo(Subjects::class, 'subject_id');
    }

    // 🔹 Student relation
    public function student()
    {
        return $this->belongsTo(Students::class, 'student_id');
    }
}
