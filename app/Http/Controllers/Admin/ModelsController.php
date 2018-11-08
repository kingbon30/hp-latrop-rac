<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\admin\models;
use App\Model\admin\make;
class ModelsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $models = models::orderBy('created_at','DESC')->get(); 
        $makes = make::orderBy('make_name','ASC')->get(); 
        return view('admin.models.show', compact('models','makes'));
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
            'make_name' => 'required',
            'model_name' => 'required'
        ]);
        $models = new models;
        $models->make_name = $request->make_name;
        $models->model_name = $request->model_name;
        $models->save();
        return redirect()->back()->with('message','Model save successfully');
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
    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'make_name' => 'required',
            'model_name' => 'required'
        ]);
        $models = models::find($request->model_id);
        $models->make_name = $request->make_name;
        $models->model_name = $request->model_name;
        $models->save();

        return redirect()->back()->with('message','Model updated successfully'); 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        models::where('id',$request->model_id)->delete();
        return redirect()->back()->with('message','Model deleted successfully');
        
    }
}
