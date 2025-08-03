<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subjects extends Model
{
    use hasFactory;
    protected $fillable = ['name', 'is_deleted', 'credit_hours'];

    public function classes()
{
    return $this->belongsToMany(Classes::class, 'class_subject');
}

}
