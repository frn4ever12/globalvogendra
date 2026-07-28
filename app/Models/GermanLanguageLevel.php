<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class GermanLanguageLevel extends Model
{
    protected $fillable = [
        'level_name',
        'level_code',
        'title',
        'short_description',
        'duration',
        'class_type',
        'class_schedule',
        'course_fee',
        'exam_name',
        'certificate',
        'students_count',
        'image',
        'icon',
        'background_color',
        'text_color',
        'button_text',
        'button_link',
        'animation',
        'ribbon',
        'display_order',
        'status'
    ];

    protected $casts = [
        'certificate' => 'boolean',
        'students_count' => 'integer',
        'display_order' => 'integer',
        'status' => 'boolean'
    ];

    public function scopeActive($query)
    {
        return $query->where('status', true);
    }

    public function scopeOrdered($query)
    {
        return $query->orderBy('display_order', 'asc');
    }

    public function curricula()
    {
        return $this->hasMany(LevelCurriculum::class, 'level_id');
    }

    public function faqs()
    {
        return $this->hasMany(LevelFaq::class, 'level_id');
    }

    public function benefits()
    {
        return $this->hasMany(LevelBenefit::class, 'level_id');
    }
}
