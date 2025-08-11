<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contributions extends Model
{
    use hasFactory;
    protected $fillable = ['student_id','amount','method_id','anonymous','date'];

     public function student()
    {
        return $this->belongsTo(Students::class, 'student_id');
    }

    public function method()
    {
        return $this->belongsTo(PaymentMethods::class, 'method_id');
    }
}
