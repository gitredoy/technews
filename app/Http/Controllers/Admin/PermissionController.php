<?php

namespace App\Http\Controllers\Admin;

use App\Permission;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;

class PermissionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->data['permissions'] = Permission::all();
        $this->data['breadcrumb1'] = 'Permission';
        $this->data['breadcrumb2'] = 'Permission List';
        return view('admin.permission.list',$this->data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
         $this->data['mode'] = 'create';
        $this->data['breadcrumb1'] = 'Permission';
        $this->data['breadcrumb2'] = 'Permission Create';
        return  view('admin.permission.create',$this->data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'display_name' => 'required|string',
            'description' => 'required',
        ]);
       $data = $request->all();
       $create = Permission::create($data);
       if ($create) {
           Session::flash('message','Permission Create Successfully');
       }
       return redirect()->route('permission.list');
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
        $this->data['permissions'] = Permission::findOrFail($id);
        $this->data['mode'] = 'edit';
        $this->data['breadcrumb1'] = 'Permission';
        $this->data['breadcrumb2'] = 'Permission Edit';
        return  view('admin.permission.create',$this->data);
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
        $request->validate([
            'name' => 'required|string',
            'display_name' => 'required|string',
            'description' => 'required',
        ]);
        $permission = Permission::find($id);
        $data = $request->all();
        $permission -> name = $data['name'];
        $permission -> display_name = $data['display_name'];
        $permission -> description = $data['description'];
        $update =   $permission -> save();
        if ($update) {
            Session::flash('message','Permission Update Successfully');
        }
        return redirect()->route('permission.list');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $delete = Permission::find($id)->delete();
        if ($delete) {
            Session::flash('message','Permission Delete Successfully');
        }
        return redirect()->route('permission.list');

    }
}
