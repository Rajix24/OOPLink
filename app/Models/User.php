<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use App\Models\Comment;
use App\Models\Like;
use Illuminate\Database\Eloquent\SoftDeletes;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'email',
        'photo',
        'tele',
        'password',
        'role_id'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }
    public function article()
    {
        return $this->hasMany(Article::class);
    }
    public function comments()
    {
        return $this->hasMany(Comment::class);
    }


    public function likes()
    {
        return $this->hasMany(Like::class);
    }
    public function hasLiked($article_id)
    {
        return $this->likes()->where('article_id', $article_id)->where('like', true)->exists();
    }
    public function following(){
        return $this->belongsToMany(User::class,'user_relations', 'following_id', "user_id")->withTimestamps(); 
    }
    public function follower(){
        return $this->belongsToMany(User::class,'user_relations', "user_id", 'following_id')->withTimestamps();
    }
    public function follow(User $user){
        return $this->following()->where('user_id', $user->id)->exists();
    }

}
