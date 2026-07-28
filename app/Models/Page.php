<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
    protected $fillable = [
        'submenu_id', 'title', 'subtitle', 'short_description',
        'banner_image', 'featured_image', 'content', 'video_url', 'pdf',
        'seo_title', 'seo_keywords', 'seo_description', 'status'
    ];

    public function subMenu()
    {
        return $this->belongsTo(SubMenu::class);
    }

    public function galleries()
    {
        return $this->hasMany(Gallery::class)->orderBy('order_no');
    }

    public function faqs()
    {
        return $this->hasMany(PageFaq::class)->orderBy('order_no');
    }

    public function sections()
    {
        return $this->hasMany(PageSection::class)->orderBy('sort_order');
    }
}
