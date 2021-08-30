<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ListingPageController extends Controller
{
  public function index($catslug){
      $this->data['categories'] = Category::where('catslug',$catslug)->orderBy('id','desc')->first();

      $this->data['posts'] =  DB::table('posts')
          ->where('categories.catslug',$catslug)
          ->where('categories.status',0)
          ->where('posts.status',0)
          ->join('categories', 'posts.category_id', '=', 'categories.id')
          ->join('users', 'posts.created_by', '=', 'users.id')
          ->select('categories.id as catid','categories.name as catname','categories.catslug as catslug', 'posts.*','users.name as authorname')
          ->orderBy('posts.id','desc')
          ->paginate(7);



      return view('front.listing',$this->data);
  }
}
