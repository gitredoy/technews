<?php

namespace App\Http\Controllers;

use App\Category;
use App\Comment;
use App\Post;
use Illuminate\Http\Request;

class DetailsPageController extends Controller
{
    public function index($category,$id,$slug){
        $this->data['post'] = Post::where('id',$id)->where('status',0)->first();

        $view = Post::find($id);
        $view->view_count = $this->data['post']->view_count + 1;
        $view->save();

        $cat = Category::where('catslug',$category)->first();
        $this->data['catposts'] = Post::where('category_id',$cat->id)->where('status',0)->orderBy('id','desc')->take(4)->get();

        return view('front.details',$this->data);
    }
    public function commentcreate(Request $request,$id){
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'comment' => 'required'
        ]);
        $comment = new Comment();
        $comment->name = $request->name;
        $comment->post_id = $request->post_id;
        $comment->email = $request->email;
        $comment->message = $request->comment;
        $comment->save();
        return redirect()->back();

    }
}
