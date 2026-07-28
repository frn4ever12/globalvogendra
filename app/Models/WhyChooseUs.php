<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class WhyChooseUs extends Model
{
    protected $fillable = [
        'title',
        'short_description',
        'image',
        'icon',
        'counter',
        'counter_suffix',
        'button_text',
        'button_link',
        'background_color',
        'icon_color',
        'animation',
        'display_order',
        'status'
    ];

    protected $casts = [
        'status' => 'boolean',
        'display_order' => 'integer'
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
