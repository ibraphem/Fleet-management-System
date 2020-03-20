<?php

namespace App\Http\Controllers;

use App\Accident;
use Illuminate\Http\Request;
use App\Vehicle;
use App\Vehicleuser;
use App\Assignment;
use Image;
use \Auth;
use \Redirect;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;

class AccidentController extends Controller
{



    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $accidents = Accident::with('vehicle','vehicleuser')->latest()->get();
        return view('accident.index', compact('accidents')); 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $vehicle_users = Vehicleuser::all();
        $vehicles = Vehicle::all();
        return view('accident.edit', compact('vehicle_users', 'vehicles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validator($request->all())->validate();
        $accident = new Accident();
        $accident->accident_date = $request->accident_date;
        $accident->time = $request->time;
        $accident->vehicle_user_id = $request->vehicle_user_id;
        $accident->vehicle_id = $request->vehicle_id;
        $accident->details = $request->details;
        $accident->description = $request->description;
        $accident->repair_cost = $request->repair_cost;
        $vehicle_assigned = Assignment::where('vehicle_id', $request->vehicle_id)->exists();
        
        $vehicle_assigned_count = DB::table('assignments')
        ->where('vehicle_id', '=', $request->vehicle_id)
        ->where('vehicle_user_id', '=', $request->vehicle_user_id)
        ->count();
        if($vehicle_assigned_count > 0){
            $accident->save();
            Session::flash('message', __('Accident recorded successfully'));
            return redirect('accident');
            }else{
                Session::flash('message', __('This vehicle was not assigned to the user you chose'));
                return redirect()->back();
            }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Accident  $accident
     * @return \Illuminate\Http\Response
     */
    public function show($id, $vehicle_id)
    {

        $accident = Accident::findOrFail($id);
        $vehicle = Vehicle::where('id', $vehicle_id)->first();
       // dd($vehicle);
        return view('accident.show', compact('accident', 'vehicle'));
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Accident  $accident
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $accident = Accident::findOrFail($id);
        $vehicle_users = Vehicleuser::all();
        $vehicles = Vehicle::all();
       return view('accident.edit', compact('accident', 'vehicle_users', 'vehicles'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Accident  $accident
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
       // dd('nonsense');
        $this->validator($request->all())->validate();
        $accident = Accident::findOrFail($id);
      //  dd($accident);
        $accident->accident_date = $request->accident_date;
        $accident->time = $request->time;
        $accident->vehicle_user_id = $request->vehicle_user_id;
        $accident->vehicle_id = $request->vehicle_id;
        $accident->details = $request->details;
        $accident->description = $request->description;
        $accident->repair_cost = $request->repair_cost;
       // dd($accident->repair_cost);
        $vehicle_assigned = Assignment::where('vehicle_id', $request->vehicle_id)->exists();
        
        $vehicle_assigned_count = DB::table('assignments')
        ->where('vehicle_id', '=', $request->vehicle_id)
        ->where('vehicle_user_id', '=', $request->vehicle_user_id)
        ->count();
        if($vehicle_assigned_count > 0){
           // dd($accident);
            $accident->update();
            Session::flash('message', __('Accident record updated successfully'));
            return redirect('accident');
            }else{
                Session::flash('message', __('This vehicle was not assigned to the user you chose'));
                return redirect()->back();
            }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Accident  $accident
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Accident::findOrFail($id)->delete();
        return redirect()->back();
    }

    protected function validator(Array $data)
    {
        return Validator::make($data, [
           
            'vehicle_id'=>'required|integer|exists:vehicles,id',
            'repair_cost'=>'required|numeric|max:9999999999',
            'details'=>'max:500',
            'description'=>'max:200'
        ]);
    }
}
