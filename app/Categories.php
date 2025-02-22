<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Categories extends Model
{
    protected $fillable = ['title'];

    public function posts(){
        return $this->hasMany(Post::class);
    }
}
