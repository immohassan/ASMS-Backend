<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ExamSchedule extends Model
{
    use hasFactory;
    protected $fillable = ['class_id', 'subject_ids', 'time_slots', 'day', 'teacher_ids'];
}
