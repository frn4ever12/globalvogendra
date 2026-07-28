<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LevelCurriculum extends Model
{
    protected $fillable = [
        'level_id',
        'title',
        'description',
        'display_order'
    ];

    protected $casts = [
        'display_order' => 'integer'
    ];

    public function level()
    {
        return $this->belongsTo(GermanLanguageLevel::class, 'level_id');
    }
}
