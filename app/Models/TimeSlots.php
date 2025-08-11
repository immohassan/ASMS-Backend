<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;

use Illuminate\Database\Eloquent\Model;

class TimeSlots extends Model
{
    use hasFactory;
    protected $fillable = ['name', 'start_time', 'end_time', 'duration'];
}
