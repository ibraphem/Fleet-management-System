<?php

namespace App\Http\Controllers;

use App\fuel;
use DB;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use App\Vehicle;
use App\Vehicleuser;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

class FuelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $fuels = Fuel::with('vehicle','vehicleuser', 'assignment')->latest()->get();
        
       return view('fuel.index', compact('fuels')); 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $vehicles = Vehicle::all();
        $vehicle_users = Vehicleuser::all();
        return view('fuel.edit', compact('vehicle_users', 'vehicles'));
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
        $fuel = new Fuel();
        $fuel->fuel_date =  $request->fuel_date;
        $fuel->vehicle_user_id = $request->vehicle_user_id; 
        $fuel->vehicle_id = $request->vehicle_id;
        $fuel->fuel_cost = $request->fuel_cost;

        $vehicle_assigned_count = DB::table('assignments')
        ->where('vehicle_id', '=', $request->vehicle_id)
        ->where('vehicle_user_id', '=', $request->vehicle_user_id)
        ->count();
//dd($vehicle_assigned_count);
if($vehicle_assigned_count > 0){
$fuel->save();
Session::flash('message', __('Fuel recorded successfully'));
return redirect('fuel');
}else{
Session::flash('message', __('This vehicle was not assigned to the user you chose'));
return redirect()->back();
}
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\fuel  $fuel
     * @return \Illuminate\Http\Response
     */
    public function show(fuel $fuel)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\fuel  $fuel
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $fuel = Fuel::findOrFail($id);
        $vehicle_users = Vehicleuser::all();
       // dd($vehicle_users);
        $vehicles = Vehicle::all();
       return view('fuel.edit', compact('fuel', 'vehicle_users', 'vehicles'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\fuel  $fuel
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validator($request->all())->validate();
        $fuel = Fuel::findOrFail($id);
        $fuel->fuel_date =  $request->fuel_date;
        $fuel->vehicle_user_id = $request->vehicle_user_id; 
        $fuel->vehicle_id = $request->vehicle_id;
        $fuel->fuel_cost = $request->fuel_cost;

        $vehicle_assigned_count = DB::table('assignments')
        ->where('vehicle_id', '=', $request->vehicle_id)
        ->where('vehicle_user_id', '=', $request->vehicle_user_id)
        ->count();
        //dd($vehicle_assigned_count);
        if($vehicle_assigned_count > 0){
        $fuel->update();
        Session::flash('message', __('Update Successful'));
        return redirect('fuel');
        }else{
        Session::flash('message', __('This vehicle was not assigned to the user you chose'));
        return redirect()->back();
        }

        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\fuel  $fuel
     * @return \Illuminate\Http\Response
     */
    public function destroy(fuel $fuel)
    {
        Fuel::findOrFail($id)->delete();
        return redirect()->back();
    }

    protected function validator(Array $data)
    {
        return Validator::make($data, [
            //'vehicle_user_id'=>'required|integer|exists:vehicle_users,id',
            'vehicle_id'=>'required|integer|exists:vehicles,id',
        ]);
    }
}
