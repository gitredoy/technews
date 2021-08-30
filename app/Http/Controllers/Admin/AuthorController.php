<?php

namespace App\Http\Controllers\Admin;


use App\Http\Requests\AuthorCreateRequest;
use App\Http\Requests\AuthorUpdateRequest;
use App\Permission;
use App\Role;
use App\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class AuthorController extends Controller
{
    public function index()
    {
        $this->data['author'] = User::where('type',2)->get();
        $this->data['breadcrumb1'] = 'Author';
        $this->data['breadcrumb2'] = 'Author List';
        return view('admin.author.list',$this->data);
    }

    public function create()
    {
        $this->data['mode'] = 'create';
        $this->data['breadcrumb1'] = 'Author';
        $this->data['breadcrumb2'] = 'Author Create';
        $this->data['role'] = Role::pluck('name','id');
        return  view('admin.author.create',$this->data);
    }

    public function store(AuthorCreateRequest $request){

        $data = new User();
        $data->name = $request->name;
        $data->email = $request->email;
        $data->password = Hash::make($request->password);
        $data->type = 2;
        $data -> save();
        foreach ($request->roles as $value){
            $data->attachRole($value);
        }
        if ($data) {
            Session::flash('message','Author Create Successfully');
        }
        return redirect()->route('author.list');
    }

    public function edit($id)
    {

        $this->data['author'] = User::findOrFail($id);
        $this->data['role'] = Role::pluck('name','id');
        //$this->data['selectedRole'] = DB::table('role_user')->where('role_user.user_id',$id)->pluck('role_id')->toArray();
        $this->data['mode'] = 'edit';
        $this->data['breadcrumb1'] = 'Author';
        $this->data['breadcrumb2'] = 'Author Edit';
        return  view('admin.author.create',$this->data);
    }

    public function update(AuthorUpdateRequest $request , $id){

        $data = User::find($id);
        $data->name = $request->name;
        $data->email = $request->email;
        if (empty($request->password)) {
            $data->password =  User::find($id)->password;
        }else{
            $data->password = Hash::make($request->password);
        }
        $data->type = 2;
        $data -> save();
        DB::table('role_user')->where('role_user.user_id',$id)->delete();
        foreach ($request->roles as $value){
            $data->attachRole($value);
        }
        if ($data) {
            Session::flash('message','Author Updated Successfully');
        }
        return redirect()->route('author.list');
    }

    public function delete($id){
        $delete = User::find($id)->delete();
        DB::table('role_user')->where('role_user.user_id',$id)->delete();
        if ($delete) {
            Session::flash('message','Author Deleted Successfully');
        }
        return redirect()->route('author.list');
    }
}
