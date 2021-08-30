<?php

namespace App\Providers;

use App\Category;
use App\Post;
use App\Style;
use App\System;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
      Schema::defaultStringLength(191);
        // Website Setting
      $systems = System::all();
      foreach ($systems as $key => $system){
          if ($key == 0) {
              $system_name = $system->value;
          }elseif ($key == 1){
              $favicon = $system->value;
          }elseif ($key == 2){
              $fontlogo = $system->value;
          }elseif ($key == 3){
              $backlogo = $system->value;
          }
      }
      $systemData = array(
          'websiteName' => $system_name,
          'favicon'     => $favicon,
          'fontLogo'    => $fontlogo,
          'backLogo'    => $backlogo,
      );

      // home page style
        $styles = Style::all();
        foreach ($styles as $key => $style){
            if ($key == 0) {
                $catId = $style->category;
                $limit = $style->limit;
                $horizontal =  DB::table('posts')
                    ->where('categories.id',$catId)
                    ->where('categories.status',0)
                    ->where('posts.status',0)
                    ->join('categories', 'posts.category_id', '=', 'categories.id')
                    ->join('users', 'posts.created_by', '=', 'users.id')
                    ->select('categories.id as catid','categories.name as catname','categories.catslug as catslug', 'posts.*','users.name as authorname')
                    ->orderBy('posts.id','desc')
                    ->limit($limit)
                    ->get();
            }elseif ($key == 1){
                $catId = $style->category;
                $limit = $style->limit;
                $firsthalf =  DB::table('posts')
                    ->where('categories.id',$catId)
                    ->where('categories.status',0)
                    ->where('posts.status',0)
                    ->join('categories', 'posts.category_id', '=', 'categories.id')
                    ->join('users', 'posts.created_by', '=', 'users.id')
                    ->select('categories.id as catid','categories.name as catname','categories.catslug as catslug', 'posts.*','users.name as authorname')
                    ->orderBy('posts.id','desc')
                    ->limit($limit)
                    ->get();
            }elseif ($key == 2){
                $catId = $style->category;
                $limit = $style->limit;
                $secondhalf =  DB::table('posts')
                    ->where('categories.id',$catId)
                    ->where('categories.status',0)
                    ->where('posts.status',0)
                    ->join('categories', 'posts.category_id', '=', 'categories.id')
                    ->join('users', 'posts.created_by', '=', 'users.id')
                    ->select('categories.id as catid','categories.name as catname','categories.catslug as catslug', 'posts.*','users.name as authorname')
                    ->orderBy('posts.id','desc')
                    ->limit($limit)
                    ->get();
            }elseif ($key == 3){
                $catId = $style->category;
                $limit = $style->limit;
                $square =  DB::table('posts')
                    ->where('categories.id',$catId)
                    ->where('categories.status',0)
                    ->where('posts.status',0)
                    ->join('categories', 'posts.category_id', '=', 'categories.id')
                    ->join('users', 'posts.created_by', '=', 'users.id')
                    ->select('categories.id as catid','categories.name as catname','categories.catslug as catslug', 'posts.*','users.name as authorname')
                    ->orderBy('posts.id','desc')
                    ->limit($limit)
                    ->get();
            }elseif ($key == 4){
                $catId = $style->category;
                $limit = $style->limit;
                $vertical =  DB::table('posts')
                    ->where('categories.id',$catId)
                    ->where('categories.status',0)
                    ->where('posts.status',0)
                    ->join('categories', 'posts.category_id', '=', 'categories.id')
                    ->join('users', 'posts.created_by', '=', 'users.id')
                    ->select('categories.id as catid','categories.name as catname','categories.catslug as catslug', 'posts.*','users.name as authorname')
                    ->orderBy('posts.id','desc')
                    ->limit($limit)
                    ->get();
            }

        }

     // Recent News
        $recent = Post::where('status',0)->orderBy('id','desc')->limit(4)->get();

    // Recent News
       $popular = Post::where('status',0)->orderBy('view_count','desc')->limit(4)->get();
       $topcomment = Post::withCount('comments')->where('status',0)->orderBy('comments_count','desc')->limit(4)->get();

    // Menu Category & Post

        $menucat =  DB::table('catmenus')
            ->where('categories.status',0)
            ->join('categories', 'catmenus.catid', '=', 'categories.id')
            ->select('categories.name as catname','categories.catslug as catslug','catmenus.*')
            //->orderBy('catmenus.id','asc')
            ->get();

        $random = DB::table('posts')
            ->where('categories.status',0)
            ->where('posts.status',0)
            ->join('categories', 'posts.category_id', '=', 'categories.id')
            ->select('categories.id as catid','categories.name as catname','categories.catslug as catslug', 'posts.*')
            ->inRandomOrder()
            ->limit(20)
            ->get();





      view()->share(
          ['systemData'=>$systemData,'horizontal' =>$horizontal,'firsthalf'=>$firsthalf,
          'secondhalf'=>$secondhalf,'square'=>$square,'vertical'=>$vertical,
          'recent'=>$recent,'popular'=>$popular,'topcomment'=>$topcomment,
          'menucat'=>$menucat,'random'=>$random
          ]);
    }
}
