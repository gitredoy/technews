<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Style extends Model
{
    public function catname(){
        return $this->belongsTo(Category::class,'category','id');
    }
}
