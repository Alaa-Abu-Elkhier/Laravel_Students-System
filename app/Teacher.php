<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Teacher extends Model

{   public $timestamps = false;
    protected $fillable = ['teacherName', 'course_id'];

    public function students() {
      
        return $this->belongsToMany(Student::class);
      }
      //teaher can teach one course
      public function courses() {

        return $this->belongsTo(Course::class);
      }
}
