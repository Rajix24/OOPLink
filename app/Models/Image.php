<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    protected $fillable = [
        'link',
    ];
    public function article() {
        return $this ->belongsTo(Article::class);
    }
}
