<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Detention extends Model
{
    use hasFactory;

    protected $fillable = ['student_id', 'reason', 'duration', 'date','parent_notified', 'notes'];

        public function student()
    {
        return $this->belongsTo(Students::class, 'student_id');
    }
}
