<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = [
        'user_id',
        'category_id',
        'store_id',
        'title',
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
}
