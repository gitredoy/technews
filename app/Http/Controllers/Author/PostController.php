<?php

namespace App\Http\Controllers\Author;

use App\Category;
use App\Post;
use App\Tag;
use App\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Intervention\Image\Facades\Image;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->data['breadcrumb1'] = 'Post';
        $this->data['breadcrumb2'] = 'Post List';
        $this->data['busers'] = User::all();
        if (Auth::user()->hasAnyRole('admin')) {
            $this->data['posts'] = Post::orderBy('id','DESC')->get();
        }else{
            $this->data['posts'] = Post::where('created_by',Auth::user()->id)->orderBy('id','DESC')->get();
        }
        return view('admin.post.list',$this->data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->data['breadcrumb1'] = 'Post';
        $this->data['breadcrumb2'] = 'Post Create';
        $this->data['mode'] = 'create';
        $this->data['categories'] = Category::where('status',0)->pluck('name','id');
        $this->data['tags'] = Tag::pluck('name','id');
        return view('admin.post.create',$this->data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'title'=>'required',
            'short_description'=>'required',
            'description'=>'required',
            'category_id'=>'required',
            'image'=>'required',
        ],[
            'title.required'=>'This field Can Not Be Empty',
            'short_description.required'=>'This field Can Not Be Empty',
            'description.required'=> 'This field Can Not Be Empty',
            'category_id.required'=> 'This field Can Not Be Empty',
            'image.required'=> 'This field Can Not Be Empty',
        ]);
        $post = new Post();
        $post-> title = $request->title ;
        $post-> short_description = $request->short_description;
        $post-> description = $request->description ;
        $post-> slug = $request->slugUrl;
        $post-> category_id = $request-> category_id;
        $post-> created_by = Auth::user()->id;
        $post-> view_count = 0 ;
        $post-> hot_news = 1 ;
        $post-> status = 0 ;

        $file = $request->file('image');
        $extension = $file->getClientOriginalExtension();
        $main_image = 'post_main_'.rand().'.'.$extension;
        $thumb_image = 'thumb_image_'.rand().'.'.$extension;
        $list_image = 'list_image_'.rand().'.'.$extension;
        Image::make($file)->resize('750','569')->save(public_path('/postimage/'.$main_image));
        Image::make($file)->resize('360','309')->save(public_path('/postimage/'.$thumb_image));
        Image::make($file)->resize('122','122')->save(public_path('/postimage/'.$list_image));
        $post-> main_image = $main_image;
        $post-> thumb_image = $thumb_image;
        $post-> list_image  = $list_image;
        $data = $post -> save();
        $post->tags()->sync($request->tags);

        if ($data) {
            Session::flash('message','Post Created  Successfully');
        }
        return redirect()->route('author.post.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $this->data['posts'] = Post::find($id);
        $this->data['breadcrumb1'] = 'Post';
        $this->data['breadcrumb2'] = 'Post Edit';
        $this->data['mode'] = 'edit';
        $this->data['categories'] = Category::where('status',0)->pluck('name','id');
        $this->data['tags'] = Tag::pluck('name','id');
        return view('admin.post.create',$this->data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'title'=>'required',
            'short_description'=>'required',
            'description'=>'required',
            'category_id'=>'required',

        ],[
            'title.required'=>'This field Can Not Be Empty',
            'short_description.required'=>'This field Can Not Be Empty',
            'description.required'=> 'This field Can Not Be Empty',
            'category_id.required'=> 'This field Can Not Be Empty',

        ]);
        $post = Post::find($id);
        $post-> title = $request->title ;
        $post-> short_description = $request->short_description;
        $post-> description = $request->description ;
        $post-> slug = $request->slugUrl;
        $post-> category_id = $request-> category_id;
        if (empty($request->file('image'))) {
            $data = $post -> save();
        }else {
            unlink(public_path('/postimage/'. $post-> main_image));
            unlink(public_path('/postimage/'. $post-> thumb_image));
            unlink(public_path('/postimage/'. $post-> list_image));
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $main_image = 'post_main_'.rand().'.'.$extension;
            $thumb_image = 'thumb_image_'.rand().'.'.$extension;
            $list_image = 'list_image_'.rand().'.'.$extension;
            Image::make($file)->resize('750','569')->save(public_path('/postimage/'.$main_image));
            Image::make($file)->resize('360','309')->save(public_path('/postimage/'.$thumb_image));
            Image::make($file)->resize('122','122')->save(public_path('/postimage/'.$list_image));
            $post-> main_image = $main_image;
            $post-> thumb_image = $thumb_image;
            $post-> list_image  = $list_image;

            $data = $post -> save();
        }
        $post->tags()->sync($request->tags);
        if ($data) {
            Session::flash('message','Post Update Successfully');
        }
        return redirect()->route('author.post.index');

    }

    public function status($id){
        $post = Post::findOrFail($id);
        if ($post->status == 1) {
            $post -> status = 0;
        }else{
            $post -> status = 1;
        }
        $data = $post -> save();

        if ($data) {
            Session::flash('message','Post Status Updated  Successfully');
        }
        return redirect()->route('author.post.index');
    }



    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::find($id);
        if ($post) {
            unlink(public_path('/postimage/'. $post-> main_image));
            unlink(public_path('/postimage/'. $post-> thumb_image));
            unlink(public_path('/postimage/'. $post-> list_image));
          $delete =  $post -> delete();
            $post->tags()->detach();
        }
        if ($delete) {
            Session::flash('message','Post Deleted  Successfully');
        }
        return redirect()->route('author.post.index');
    }
}
