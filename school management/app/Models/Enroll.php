<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Student;

class Enroll extends Model
{
    use HasFactory;

    public function subject()
    {
     return $this->belongsTo('App\Models\Subject');
    }

    public function student()
    {
        return $this->belongsTo('App\Models\Student');
    }
}
