<?php

namespace App\Http\Controllers;

use App\Category;
use App\Comment;
use App\Post;
use App\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $this->data['allPost'] = Post::all();
        $this->data['publishPost'] = Post::where('status',0)->orderBy('id','desc')->get();
        $this->data['UnpublishPost'] = Post::where('status',1)->orderBy('id','desc')->get();

        $this->data['allCat'] = Category::all();
        $this->data['publishCat'] = Category::where('status',0)->orderBy('id','desc')->get();
        $this->data['UnpublishCat'] = Category::where('status',1)->orderBy('id','desc')->get();

        $this->data['allCom'] = Comment::all();
        $this->data['publishCom'] = Comment::where('status',0)->orderBy('id','desc')->get();
        $this->data['UnpublishCom'] = Comment::where('status',1)->orderBy('id','desc')->get();

        $this->data['allTag'] = Tag::all();

        $this->data['viewPost'] = Post::where('status',0)->orderBy('view_count','desc')->limit(10)->get();
        $this->data['topcomment'] = Post::withCount('comments')->where('status',0)->orderBy('comments_count','desc')->limit(10)->get();
        //$topcomment = Post::withCount('comments')->where('status',0)->orderBy('comments_count','desc')->limit(4)->get();
        return view('admin.dashboard',$this->data);
    }
    public function search(Request $request){
        $query = $request->get('searchQueries');
        //$posts = Post::where('title','like','%'.$query.'%')->where('title',empty($query))->get();
        $posts =  DB::table('posts')
            ->where('categories.status',0)
            ->where('posts.status',0)
            ->where('title','like','%'.$query.'%')
            ->where('title',empty($query))
            ->join('categories', 'posts.category_id', '=', 'categories.id')
            ->select('categories.id as catid','categories.name as catname','categories.catslug as catslug', 'posts.*')
            ->get();
        return json_encode($posts);
    }
}
