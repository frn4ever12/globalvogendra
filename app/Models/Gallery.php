<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Gallery extends Model
{
    protected $fillable = ['page_id', 'image', 'order_no'];

    public function page()
    {
        return $this->belongsTo(Page::class);
    }
}
