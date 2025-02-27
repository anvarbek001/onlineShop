<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Store extends Model
{
    protected $fillable = [
        'title',
        'description',
        'address',
        'photo'
    ];
}
