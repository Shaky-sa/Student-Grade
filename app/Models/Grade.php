<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Grade extends Model
{
    protected $fillable = ['student_id', 'subject_id', 'grade'];

    public function student()
    {
        return $this->belongsTo(Student::class);
    }

    public function subject()
    {
        return $this->belongsTo(Subject::class);
    }

    // Computed attribute for remarks
    public function getRemarksAttribute()
    {
        return $this->grade >= 75 ? 'PASS' : 'FAIL';
    }
}
