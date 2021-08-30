<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use App\Post;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;

class CategoryController extends Controller
{
    public function __construct()
    {
        $this->data['menu'] = 'category';
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->data['categories'] = Category::all();
        $this->data['breadcrumb1'] = 'Category';
        $this->data['breadcrumb2'] = 'Category List';
        return view('admin.category.list',$this->data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->data['SelectStatus'] = array('0'=>'Publish','1'=>'Unpublish');
        $this->data['mode'] = 'create';
        $this->data['breadcrumb1'] = 'Category';
        $this->data['breadcrumb2'] = 'Category Create';
        return view('admin.category.create',$this->data);
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
        'name' => 'required|string|unique:categories',
        'catslug' => 'required|string|unique:categories',
        ],[
        'name.required' =>'Category Name Cannot Be Empty',
        'catslug.required' =>'Category Slug Name Cannot Be Empty',
        ]);
        $category = new Category();
        $category->name = $request->name;
        $category->catslug = strtolower($request->catslug);
        $category->status = $request->status;
        $store = $category->save();

        if ($store) {
            Session::flash('message','Category Created Successfully');
        }
        return redirect()->route('admin.categories.index');

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
        $this->data['SelectStatus'] = array('0'=>'Publish','1'=>'Unpublish');
        $this->data['categories'] = Category::findOrFail($id);
        $this->data['mode'] = 'edit';
        $this->data['breadcrumb1'] = 'Category';
        $this->data['breadcrumb2'] = 'Category Edit';
        return  view('admin.category.create',$this->data);
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
            'name' => 'required|string',
            'catslug' => 'required|string',
        ],[
            'name.required' =>'Category Name Cannot Be Empty',
            'catslug.required' =>'Category Slug Name Cannot Be Empty',
        ]);

        $category = Category::find($id);
        $category->name = $request->name;
        $category->catslug = strtolower($request->catslug);
        $category->status = $request->status;
        $store = $category->save();

        if ($store) {
            Session::flash('message','Category Update Successfully');
        }
        return redirect()->route('admin.categories.index');
    }
    public function status($id){

       $category = Category::find($id);
       if ($category -> status == 0) {
           $category -> status = 1;
       }else{
           $category -> status = 0;
       }
       $store = $category->save();
        if ($store) {
            Session::flash('message','Category Status Updated');
        }
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //category_id
        $delete_id = Category::find($id);
        $posts = Post::where('category_id',$id)->get();
        foreach ($posts as $post){
            $pcid = $post->id;
            $cpost = Post::find($pcid);
            $cpost->category_id = 1;
            $cpost->save();
        }
        $delete_id->delete();
        if ($delete_id) {
            Session::flash('message','Category Deleted Successfully');
        }
        return redirect()->route('admin.categories.index');
    }
}
