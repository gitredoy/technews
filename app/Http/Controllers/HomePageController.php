<?php

namespace App\Http\Controllers;

use App\Category;
use App\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomePageController extends Controller
{
    public function index(){

        //Hot News
        $hot = Post::where('status',0)->where('hot_news',0)->orderBy('id','DESC')->count();
        if ($hot == 0) {
            $this->data['hotnews'] = Post::where('status',0)->inRandomOrder()->first();
        }else {
            $this->data['hotnews'] = Post::where('status',0)->where('hot_news',0)->orderBy('id','DESC')->first();
        }

        //Top 2 Views
        $this->data['toptwo'] = Post::where('status',0)->orderBy('view_count','desc')->orderBy('id','desc')->limit(2)->get();

        //Category with Post
        $this->data['categoryPost'] = Category::with('posts')->where('status',0)->orderBy('id','desc')->limit(5)->get();

        return view('front.home',$this->data);
    }






}
