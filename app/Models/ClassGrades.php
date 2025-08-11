<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClassGrades extends Model
{
    use HasFactory;
    protected $fillable = ['student_id', 'class_id', 'subject_id', 'remarks', 'grade', 'total_marks', 'marks_obtained'];
}
