<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class University extends Model
{
    protected $guarded=[];
    public function country()
    {
        return $this->belongsTo(Country::class);
    }
    public function courses()
    {
        return $this->hasMany(Course::class);
    }
}
