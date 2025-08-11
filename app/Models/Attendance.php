<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Attendance extends Model
{
    use HasFactory;
    protected $table = "attendance";
    protected $fillable = ['class_id', 'student_id', 'subject_id', 'status', 'notes', 'date'];
     public function student()
    {
        return $this->belongsTo(Students::class);
    }

    public function class()
    {
        return $this->belongsTo(Classes::class, 'class_id');
    }

    public function subject()
    {
        return $this->belongsTo(Subjects::class);
    }
}
