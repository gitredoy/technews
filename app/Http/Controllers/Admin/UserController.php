<?php

namespace App\Http\Controllers\Admin;

use App\Roleper;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        return view('admin.author.list')->with('users',User::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->data['roles'] = Roleper::all();
        return view('admin.author.create',$this->data);
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
           'name' => 'required',
           'email' => 'required|unique:users',
           'roles' => 'required',
           'password' => 'required',
       ]);
        $data = new User();
        $data->name = $request->name;
        $data->email = $request->email;
        $data->password = Hash::make($request->password);
        $data -> save();
        $data->roles()->sync($request->roles);

        return  redirect()->route('admin.user.index')->with('message',' New User has been created');



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
        if (Auth::user()->id == $id) {
            return redirect()->route('admin.user.index')->with('message','You are not allow to edit yourself');
        }
        return view('admin.author.edit')->with(['user'=>User::find($id),'roles'=>Roleper::all()]);

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
        if (Auth::user()->id == $id) {
            return redirect()->route('admin.user.index');
        }
        $data = User::find($id);
        $data->name = $request->name;
        $data->email = $request->email;
        if (empty($request->password)) {
            $data->password =  User::find($id)->password;
        }else{
            $data->password = Hash::make($request->password);
        }
        $data -> save();

        $data->roles()->sync($request->roles);

        return  redirect()->route('admin.user.index')->with('message','User has been updated');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        if (Auth::user()->id == $id) {
            return redirect()->route('admin.user.index')->with('message','You are not allow to Delete yourself');
        }
        $user = User::find($id);
        if ($user) {
            $user->roles()->detach();
            $user->delete();
            return  redirect()->route('admin.user.index')->with('message','User has been Deleted');
        }
        return  redirect()->route('admin.user.index')->with('message','User Not Deleted');

    }
}
