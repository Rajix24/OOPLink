<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Link extends Model
{
    protected $fillable = [
        'name',
        'article_id'
    ];

    public function article(){
        return $this->belongsTo(Article::class);
    }
}
