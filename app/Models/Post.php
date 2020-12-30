<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Model\User;
use App\Model\Comment;
use App\Model\Tag;

class Post extends Model
{
    use HasFactory;

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }

    public function comments()
    {
        return $this->hasMany('App\Models\Comment');
    }

    public function tags()
    {
        return $this->belongsToMany('App\Models\Tag');
    }

    public function getImageAttribute()
    {
       return $this->post_image;
    }

    protected $fillable = [
        'title',
        'description',
        'post_image'
    ];

    protected $attributes = [
        'solved' => false // The solved attribute is false by default
    ];
}
