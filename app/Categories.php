<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Categories extends Model
{
    protected $fillable = ['uz','title','ru'];

    public function posts(){
        return $this->hasMany(Post::class,'category_id','id');
    }
}
