<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Catmenu extends Model
{
    public function catnames(){
        return $this->belongsTo(Category::class,'catid','id');
    }
}
