<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PageSection extends Model
{
    protected $fillable = [
        'page_id', 'section_type', 'title', 'content', 'image', 'image2',
        'gallery', 'video_url', 'button_text', 'button_link', 'file', 'items', 'sort_order'
    ];

    protected $casts = [
        'gallery' => 'array',
        'items' => 'array',
    ];

    public function page()
    {
        return $this->belongsTo(Page::class);
    }
}
