<?php

namespace App\Http\Controllers;

use App\Tag;
use Illuminate\Http\Request;

class TagPostController extends Controller
{
    public function index($tagname){
        $this->data['tagPost'] = Tag::where('name',$tagname)->first();
        $this->data['posts'] = $this->data['tagPost']->posts()->latest()->paginate(9);
        return view('front.taglisting',$this->data);
    }
}
