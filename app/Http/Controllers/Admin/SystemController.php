<?php

namespace App\Http\Controllers\Admin;

use App\System;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use Intervention\Image\Facades\Image;

class SystemController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->data['breadcrumb1'] = 'Setting';
        $this->data['breadcrumb2'] = 'Basic Information';
        $this->data['system'] = System::all();
        $this->data['name'] = System::find(1);
        $this->data['favicon'] = System::find(2);
        $this->data['font'] = System::find(3);
        $this->data['back'] = System::find(4);
        return view('admin.system.list',$this->data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        $this->data['breadcrumb1'] = 'Setting';
        $this->data['breadcrumb2'] = 'Edit Basic Information';
        $this->data['mode'] = 'edit';
        $this->data['system'] = System::findOrFail($id);
        return view('admin.system.create',$this->data);
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
           $system = System::find($id);
        if ($system->id == 1) {
            $system->value = $request->name;
        }elseif ($system->id == 2){
            unlink(public_path('/systemimage/'. $system-> value));
            $file = $request->file('value');
            $extension = $file->getClientOriginalExtension();
            $favicon = 'favicon_'.rand().'.'.$extension;
            Image::make($file)->resize('122','122')->save(public_path('/systemimage/'.$favicon));
            $system->value = $favicon;

        }elseif ($system->id == 3){
            //unlink(public_path('/systemimage/'. $system-> value));
            $file = $request->file('value');
            $extension = $file->getClientOriginalExtension();
            $fontImage = 'fontImage_'.rand().'.'.$extension;
            Image::make($file)->save(public_path('/systemimage/'.$fontImage));
            $system->value = $fontImage;

        }elseif ($system->id == 4){
            unlink(public_path('/systemimage/'. $system-> value));
            $file = $request->file('value');
            $extension = $file->getClientOriginalExtension();
            $backImage = 'backImage_'.rand().'.'.$extension;
            Image::make($file)->save(public_path('/systemimage/'.$backImage));
            $system->value = $backImage;
        }
        $save = $system->save();
        if ($save) {
            Session::flash('message','Website Information Updated');
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
        //
    }
}
