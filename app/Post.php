<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Post extends Model
{
    protected $fillable = [
        'user_id',
        'category_id',
        'store_id',
        'title',
        'slug',
        'short_content',
        'content',
        'price',
        'photo',
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function store(){
        return $this->belongsTo(Store::class);
    }

    public function category(){
        return $this->belongsTo(Categories::class);
    }

    public function like(){
        return $this->hasOne(Like::class);
    }

    public static function boot(){
        parent::boot();

        static::creating(function($post){
            $post->slug = Str::slug($post->title,'-');
        });
    }
}
