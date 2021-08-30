<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use App\Style;
use App\System;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;

class StyleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->data['style'] = Style::all();
        $this->data['breadcrumb1'] = 'Style';
        $this->data['breadcrumb2'] = 'Style List';
        return view('admin.style.list',$this->data);
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
        $this->data['breadcrumb1'] = 'Style';
        $this->data['breadcrumb2'] = 'Style Edit';
        $this->data['mode'] = 'edit';
        $this->data['categories'] = Category::where('status',0)->pluck('name','id');
        $this->data['style'] = Style::find($id);
        return view('admin.style.create',$this->data);

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
            'category' => 'required',
            'limit' => 'required',
        ]);
        $style = Style::find($id);
        $style->category = $request->category;
        $style->limit = $request->limit;
        $save = $style->save();
        if ($save) {
            Session::flash('message','Style Updated Successfully');
        }
        return redirect()->route('admin.style.index');
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
