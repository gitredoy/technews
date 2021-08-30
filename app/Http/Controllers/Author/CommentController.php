<?php

namespace App\Http\Controllers\Author;

use App\Comment;
use App\Post;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class CommentController extends Controller
{
    public  function index($author,$post){
        $this->data['breadcrumb1'] = 'Comment';
        $this->data['breadcrumb2'] = 'Comment List';
        if ( Auth::user()->hasAnyRole('admin') || Auth::user()->id == $author  ) {
            $this->data['post'] = Post::where('id',$post)->first();
            $this->data['comments'] = Comment::where('post_id',$post)->get();
        }else {
            Session::flash('message','No Excess');
            return redirect()->back();
        }

        return view('admin.comment.postcomment',$this->data);
    }

    public function status($id){

         $cmnt = Comment::find($id);
        if ($cmnt->status == 0) {
            $cmnt->status = 1;
        }else{
            $cmnt->status = 0;
        }
        $cmnt->save();
        Session::flash('message','Comment Status Changed');
        return redirect()->back();
    }
    public  function edit(){

    }
    public function destroy($id){
        $cmnt = Comment::find($id);
        $cmnt->delete();
        Session::flash('message','Comment Deleted');
        return redirect()->back();
    }


}
