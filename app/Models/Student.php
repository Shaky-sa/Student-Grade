<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    protected $fillable = ['student_name'];

    public function grades()
    {
        return $this->hasMany(Grade::class);
    }
}

