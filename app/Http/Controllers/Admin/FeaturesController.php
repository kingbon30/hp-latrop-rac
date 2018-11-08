<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\admin\feature;

class FeaturesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $features = feature::orderBy('created_at','DESC')->get(); 
        return view('admin.features.show',compact('features'));
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
        $this->validate($request,[
            'feature_name' => 'required|max:50|unique:features|min:3',
            'feature_slug' => 'required'
        ]);
        $features = new feature;
        $features->feature_name = $request->feature_name;
        $features->feature_slug = $request->feature_slug;
        $features->save();
        return redirect()->back()->with('message','Feature save successfully');
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
            'feature_name' => 'required|max:50|unique:features|min:3',
            'feature_slug' => 'required'
        ]);
        $features = feature::find($request->feature_id);
        $features->feature_name = $request->feature_name;
        $features->feature_slug = $request->feature_slug;
        $features->save();

        return redirect()->back()->with('message','Feature updated successfully'); 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        feature::where('id',$request->feature_id)->delete();
        return redirect()->back()->with('message','Feature deleted successfully');
    }
}
