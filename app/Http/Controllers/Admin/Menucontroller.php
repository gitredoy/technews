<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use App\Catmenu;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;

class Menucontroller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->data['allmenu'] = Catmenu::all();
        $this->data['breadcrumb1'] = 'Menu';
        $this->data['breadcrumb2'] = 'Menu List ';
        return view('admin.catmenu.list',$this->data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->data['breadcrumb1'] = 'Menu';
        $this->data['breadcrumb2'] = 'Menu Create';
        $this->data['mode'] = 'create';
        $this->data['categories'] = Category::where('status',0)->pluck('name','id');
        return view('admin.catmenu.create',$this->data);
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
            'catid' => 'required|unique:catmenus',
            'limit' => 'required',
        ],[
            'catid.required' => ' This Field Required',
            'catid.unique' => 'The Category has already been taken',
            'limit.required' => ' This Field Required',
        ]);


        $menu = new Catmenu();
        $menu->catid = $request->catid;
        $menu->limit = $request->limit;
        $save = $menu->save();
        if ($save) {
            Session::flash('message','Menu Created Successfully');
        }
       return redirect()->route('admin.menu.index');
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
        $this->data['breadcrumb1'] = 'Menu';
        $this->data['breadcrumb2'] = 'Menu-Category Edit';
        $this->data['mode'] = 'edit';
        $this->data['categories'] = Category::where('status',0)->pluck('name','id');
        $this->data['menu'] = Catmenu::findOrFail($id);
        return view('admin.catmenu.create',$this->data);
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
            'limit' => 'required'
        ],[
            'limit.required' => 'This Field Required'
        ]);
        $menu = Catmenu::find($id);
        $menu -> catid = $request->catid;
        $menu -> limit = $request->limit;
        $save = $menu->save();
        if ($save) {
            Session::flash('message','Menu Updated Successfully');
        }
        return redirect()->route('admin.menu.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $menu = Catmenu::find($id);
        $delete = $menu->delete();
        if ($delete) {
            Session::flash('message','Menu Deleted Successfully');
        }
        return redirect()->back();
    }
}
