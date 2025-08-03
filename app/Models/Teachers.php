<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Teachers extends Model
{
    use hasFactory;
    protected $fillable = ['user_id','designation','department_id'];

    public function user()
{
    return $this->belongsTo(User::class);
}

public function department()
{
    return $this->belongsTo(Departments::class);
}

}
