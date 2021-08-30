<?php

namespace App\Http\Controllers\Author;

use App\Post;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;

class HotnewsController extends Controller
{
    public function hotnews($id){
        $post = Post::findOrFail($id);
        if ($post->hot_news == 1) {
            $post -> hot_news = 0;
        }else{
            $post -> hot_news = 1;
        }
        $data = $post -> save();

        if ($data) {
            Session::flash('message','Hot News Updated  Successfully');
        }
        return redirect()->route('author.post.index');
    }
}
