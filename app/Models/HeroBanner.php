<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HeroBanner extends Model
{
    protected $fillable = [
        'title', 'subtitle', 'description', 'button_text', 'button_url',
        'desktop_image', 'mobile_image', 'overlay_color', 'overlay_opacity',
        'text_position', 'text_color', 'button_color', 'button_text_color',
        'enable_dark_overlay', 'enable_gradient', 'banner_height',
        'display_order', 'status', 'start_date', 'end_date'
    ];

    protected $casts = [
        'enable_dark_overlay' => 'boolean',
        'enable_gradient' => 'boolean',
        'status' => 'boolean',
        'start_date' => 'date',
        'end_date' => 'date',
    ];

    public function scopeActive($query)
    {
        return $query->where('status', true)
            ->where(function($q) {
                $q->whereNull('start_date')
                    ->orWhere('start_date', '<=', now());
            })
            ->where(function($q) {
                $q->whereNull('end_date')
                    ->orWhere('end_date', '>=', now());
            });
    }

    public function scopeOrdered($query)
    {
        return $query->orderBy('display_order');
    }
}
