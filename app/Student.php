<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class student extends Model
{
    protected $fillable = [
        'name', 'degree',
    ];
    public function courses()
    {
        return $this->belongsToMany(Course::class);
    }
    public function teachers() {

        return $this->belongsToMany(Teacher::class);
      }
   
}
