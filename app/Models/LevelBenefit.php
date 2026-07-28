<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LevelBenefit extends Model
{
    protected $fillable = [
        'level_id',
        'title',
        'description',
        'icon',
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
