<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    public $timestamps = false;

    protected $fillable = [
         'courseName'
    ];
    public function students()
    {
        return $this->belongsToMany(student::class);
    }
    //the course can be teached by more than teacher
    public function teachers() {

        return $this->belongsToMany(Teacher::class);
      }
}
