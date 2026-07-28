<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class VisaSuccessStory extends Model
{
    protected $fillable = [
        'student_name',
        'country',
        'city',
        'university',
        'course',
        'intake',
        'visa_date',
        'visa_type',
        'student_image',
        'visa_image',
        'passport_image',
        'testimonial',
        'rating',
        'video_url',
        'display_order',
        'status'
    ];

    protected $casts = [
        'visa_date' => 'date',
        'rating' => 'integer',
        'display_order' => 'integer',
        'status' => 'boolean'
    ];

    protected $dates = [
        'visa_date'
    ];

    public function scopeActive($query)
    {
        return $query->where('status', true);
    }

    public function scopeOrdered($query)
    {
        return $query->orderBy('display_order', 'asc');
    }
}
