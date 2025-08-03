<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Students extends Model
{
    use hasFactory;
    protected $fillable = ['user_id','roll_no', 'gender', 'class_id','parent_id', 'dob'];

    public function user()
{
    return $this->belongsTo(User::class);
}

public function parent()
{
    return $this->belongsTo(Parents::class, 'parent_id');
}

public function class()
{
    return $this->belongsTo(Classes::class, 'class_id'); // or ClassRoom if named differently
}

}
