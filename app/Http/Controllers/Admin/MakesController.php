<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\admin\make;

class MakesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $makes = make::orderBy('created_at','DESC')->get(); 
        return view('admin.makes.show',compact('makes'));
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
        // return $request->all();
        $this->validate($request,[
            'make_name' => 'required|max:50|unique:makes|min:3',
            'make_slug' => 'required'
        ]);
        $makes = new make;
        $makes->make_name = $request->make_name;
        $makes->make_slug = $request->make_slug;
        $makes->save();
        return redirect()->back()->with('message','Make save successfully');
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
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $this->validate($request,[
            'make_name' => 'required|max:50|unique:makes|min:3',
            'make_slug' => 'required'
        ]);
        $makes = make::find($request->make_id);
        $makes->make_name = $request->make_name;
        $makes->make_slug = $request->make_slug;
        $makes->save();

        // $make = make::findOrFail($request->make_id);
        // $make->update($request->all());
        return redirect()->back()->with('message','Make updated successfully'); 
        // return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        // make::where('id',$id)->delete();
        make::where('id',$request->make_id)->delete();
          // $make = make::findOrFail($request->make_id);
        // $make->update($request->all());
        return redirect()->back()->with('message','Make deleted successfully');
    }
}
