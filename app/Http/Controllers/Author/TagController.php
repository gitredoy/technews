<?php

namespace App\Http\Controllers\Author;

use App\Tag;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;

class TagController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->data['tags'] = Tag::all();
        $this->data['breadcrumb1'] = 'Tag';
        $this->data['breadcrumb2'] = 'Tag List';
        return view('admin.tag.list',$this->data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->data['mode'] = 'create';
        $this->data['breadcrumb1'] = 'Tag';
        $this->data['breadcrumb2'] = 'Tag Create';
        return view('admin.tag.create',$this->data);
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
            'name' => 'required|string',
        ],[
            'name.required' =>'Tag Name Cannot Be Empty',
        ]);
        $tag = new Tag();
        $tag->name = $request->name;
        $store = $tag->save();

        if ($store) {
            Session::flash('message','Tag Created Successfully');
        }
        return redirect()->route('author.tag.index');
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

        $this->data['tags'] = Tag::findOrFail($id);
        $this->data['mode'] = 'edit';
        $this->data['breadcrumb1'] = 'Tag';
        $this->data['breadcrumb2'] = 'Tag Edit';
        return  view('admin.tag.create',$this->data);
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
        ],[
            'name.required' =>'Tag Name Cannot Be Empty',
        ]);
        $tag = Tag::find($id);
        $tag->name = $request->name;
        $store = $tag->save();

        if ($store) {
            Session::flash('message','Tag Updated Successfully');
        }
        return redirect()->route('author.tag.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $tag = Tag::find($id);
        $tag->posts()->detach();
        $tag->delete();

        if ($tag) {
            Session::flash('message','Tag Deleted Successfully');
        }
        return redirect()->route('author.tag.index');
    }
}
