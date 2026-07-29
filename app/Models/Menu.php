<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    protected $fillable = ['name', 'slug', 'icon', 'order_no', 'status'];

    public function subMenus()
    {
        return $this->hasMany(SubMenu::class)->orderBy('order_no');
    }
}
