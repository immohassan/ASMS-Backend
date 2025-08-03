<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Parents extends Model
{
    use hasFactory;
    protected $fillable = ['user_id','student_id'];    
    public function user()
{
    return $this->belongsTo(User::class);
}

public function student()
{
    return $this->belongsTo(Students::class);
}

}
