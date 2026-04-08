<?php

namespace App\Models;

use App\Models\Image;
use App\Models\Category;
use App\Models\Link;
use App\Models\Comment;
use App\Models\Like;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    protected $fillable = [
        'title',
        'introduction',
        'body',
        'conclusion',
        'user_id',
        'tag_id',
        'created_at',
        'updated_at'
    ];


    public function images(){
        return $this->hasMany(Image::class);
    }
    public function category(){
        return $this->belongsToMany(Category::class);
    }
    public function tag(){
        return $this->belongsTo(Tag::class);
    }
    public function link(){
        return $this->hasMany(Link::class);
    }
    public function user(){
        return $this->belongsTo(User::class);
    }
    public function comments(){
        return $this->hasMany(Comment::class);
    } 
    public function likes()
    {
        return $this->hasMany(Like::class)->where("like", true);    
    }
}

