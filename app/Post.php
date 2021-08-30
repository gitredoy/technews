<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    public function category(){
        return $this->belongsTo(Category::class);
    }

    public function author(){
        return $this->belongsTo(User::class,'created_by','id');
    }

    public function tags(){
        return $this->belongsToMany(Tag::class);
    }
    public function comments(){
        return $this->hasMany(Comment::class);
    }
}
