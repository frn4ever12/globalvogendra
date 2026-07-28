<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PageFaq extends Model
{
    protected $fillable = ['page_id', 'question', 'answer', 'order_no'];

    public function page()
    {
        return $this->belongsTo(Page::class);
    }
}
