<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SubMenu extends Model
{
    protected $fillable = ['menu_id', 'name', 'slug', 'banner_image', 'featured_image', 'order_no', 'status'];

    public function menu()
    {
        return $this->belongsTo(Menu::class);
    }

    public function page()
    {
        return $this->hasOne(Page::class);
    }
}
