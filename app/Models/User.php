<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use App\Model\Post;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    public function posts()
    {
        return $this->hasMany('App\Models\Post');
    }

    public function comments()
    {
        return $this->hasMany('App\Models\Comment');
    }

    public function isAdmin()
    {
        return $this->admin;
    }

    public function getImageAttribute()
    {
       return $this->profile_image;
    }

    /**
     * The attributes that are mass assignable.
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'profile_image'
    ];

    protected $attributes = [
        'admin' => false
    ];
}
