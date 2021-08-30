<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SearchPostController extends Controller
{
    public function index(Request $request){
        $this->data['query'] = strip_tags($request->get('fontquery')) ;
        if (empty($this->data['query'])) {
            return redirect()->route('front.home');

        }else {
        $this->data['posts'] =  DB::table('posts')
            ->where('categories.status',0)
            ->where('posts.status',0)
            ->where('title','like','%'.$this->data['query'].'%')
            ->where('description','like','%'.$this->data['query'].'%')
            ->join('categories', 'posts.category_id', '=', 'categories.id')
            ->join('users', 'posts.created_by', '=', 'users.id')
            ->select('categories.id as catid','categories.name as catname','categories.catslug as catslug', 'posts.*','users.name as authorname')
            ->orderBy('posts.id','desc')
            ->get();

        return view('front.search',$this->data);
        }
    }
}
