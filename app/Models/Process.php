<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Process extends Model
{
    protected $fillable = [
        'title',
        'description',
        'image',
        'icon',
        'button_text',
        'button_link',
        'background_color',
        'icon_color',
        'animation',
        'step_no',
        'display_order',
        'status'
    ];

    protected $casts = [
        'status' => 'boolean',
        'display_order' => 'integer',
        'step_no' => 'integer'
    ];

    public function scopeActive($query)
    {
        return $query->where('status', true);
    }

    public function scopeOrdered($query)
    {
        return $query->orderBy('display_order', 'asc')->orderBy('step_no', 'asc');
    }
}
