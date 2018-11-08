<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\admin\vehicle;
use App\Model\admin\feature;
use App\Model\admin\model;
use Illuminate\Support\Facades\DB;

class VehiclesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $vehicles = vehicle::all();
        $features = feature::all();

        return view('admin.vehicles.show',compact('vehicles','features'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $features = feature::orderBy('feature_name','ASC')->get(); 
        $model_list = DB::table('models')
             ->groupBy('make_name')
             ->get();
        return view('admin.vehicles.create',compact('features'))->with('model_list', $model_list);

    }

    function fetch(Request $request)
    {
         $select = $request->get('select');
         $value = $request->get('value');
         $dependent = $request->get('dependent');
         $data = DB::table('models')
               ->where($select, $value)
               ->groupBy($dependent)
               ->get();
         $output = '<option value="">Select '.ucfirst($dependent).'</option>';
         foreach($data as $row)
         {
          $output .= '<option value="'.$row->$dependent.'">'.$row->$dependent.'</option>';
         }
         echo $output;
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
            'listing_id' => 'required|unique:vehicles',
            'images' => 'max:2000',
            'description' => 'required',
            'features' => 'required',
            'make' => 'required',
        ]);

        $input=$request->all();
        $images=array();
        if($files=$request->file('images')){
            foreach($files as $file){
                $name=date('mdYHis').uniqid().'.'.$file->getClientOriginalExtension();
                $file->move('uploaded-images',$name);
                $images[]=$name;
            }
        }

        // Vehicle Slug
        $slugify = str_slug($request->make.'-'.$request->model.'-'.$request->year.'-'.$request->listing_id);
        /*Insert your data*/
        $vehicles = new vehicle;
        $vehicles->listing_id = $request->listing_id;
        $vehicles->make = $request->make;
        $vehicles->model = $request->model;
        $vehicles->milleage = $request->milleage;
        $vehicles->engine = $request->engine;
        $vehicles->year = $request->year;
        $vehicles->edition = $request->edition;
        $vehicles->transmission = $request->transmission;
        $vehicles->fuel = $request->fuel;
        $vehicles->door = $request->door;
        $vehicles->seat = $request->seat;
        $vehicles->drivetype = $request->drivetype;
        $vehicles->condition = $request->condition;
        $vehicles->bodytype = $request->bodytype;
        $vehicles->vehicle_price = $request->vehicle_price;
        $vehicles->vehicle_color = $request->vehicle_color;
        $vehicles->vehicle_price_detail = $request->vehicle_price_detail;
        $vehicles->description = $request->description;
        $vehicles->images = implode(",",$images);
        $vehicles->vehicle_slug = $slugify.'.html';
        $vehicles->vehicle_status = $request->vehicle_status;
        $vehicles->vehicle_approval = $request->vehicle_approval;
        $vehicles->save();
        $vehicles->features()->sync($request->features);
        return redirect( route('vehicles.index'))->with('message','Vehicle save successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // // return $vehicle_slug->all();
        $vehicles = vehicle::where('id',$id)->first(); 
        $features = feature::all();
        return view('admin.vehicles.view',compact('vehicles'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $features = feature::orderBy('feature_name','ASC')->get(); 
        $model_list = DB::table('models')
             ->groupBy('make_name')
             ->get();
        $vehicles = vehicle::where('id',$id)->first(); 
        return view('admin.vehicles.edit',compact('features','vehicles'))->with('model_list', $model_list);
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        vehicle::where('id',$request->vehicle_id)->delete();
        return redirect()->back()->with('message','Vehicle listing deleted successfully');
    }

    

}
