<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AboutUs extends Model
{
    protected $fillable = [
        'title', 'description', 'image', 'button_text', 
        'text_color', 'background_color', 'status', 'display_order'
    ];

    protected $casts = [
        'status' => 'boolean',
    ];

    public function scopeActive($query)
    {
        return $query->where('status', true)->orWhere('status', '1');
    }

    public function scopeOrdered($query)
    {
        return $query->orderBy('display_order');
    }
}
