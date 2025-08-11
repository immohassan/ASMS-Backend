<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Test extends Model
{
    protected $table = 'test';
    use hasFactory;
        protected $fillable = ['title', 'description', 'class_id', 'subject_id', 'total_marks', 'due_date'];

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
