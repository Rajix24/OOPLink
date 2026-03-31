<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    protected $fillable = [
        'title',
        'introduction',
        'body',
        'conclusion',
        'use_id',
        'tag_id',
        'created_at',
        'updated_at'
    ];


    public function image(){
        return $this->belongsToMany(Image::class);
    }
    public function category(){
        return $this->belongsToMany(Category::class);
    }
    public function tag(){
        return $this->belongsTo(Tag::class);
    }
    public function links(){
        return $this->hasMany(Link::class);
    }
}

