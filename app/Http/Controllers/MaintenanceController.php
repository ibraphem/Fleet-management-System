<?php

namespace App\Http\Controllers;

use App\Maintenance;
use App\MaintenanceRoutine;
use App\Vehicle;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class MaintenanceController extends Controller
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
        $maintenances = Maintenance::where('status', '=', 1)->with('vehicle','maintenance_routine')->get();
        //$maintenances = Maintenance::with('vehicle','maintenance_routine')->latest()->get();
     //   dd($maintenances);
        return view('maintenance.index', compact('maintenances'));

     
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $maintenance_routines = MaintenanceRoutine::pluck('title', 'id');
        $vehicles = Vehicle::all();
       return view('maintenance.edit', compact('maintenance_routines', 'vehicles'));

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
        $maintenance = new Maintenance();
        $maintenance->maintenance_routine_id = $request->maintenance_routine_id;
        $maintenance->vehicle_id = $request->vehicle_id;
        $maintenance->maintenance_cost = $request->maintenance_cost;
        $maintenance->maintenance_date = $request->maintenance_date;
        $maintenance->remark =  $request->remark;
        $maintenance->status = 1;
        $maintenance->save();
        Session::flash('message', __('Maintenance carried out successfully'));
        return redirect('maintenance');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Maintenance  $maintenance
     * @return \Illuminate\Http\Response
     */
    public function show(Maintenance $maintenance)
    {
        
       
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Maintenance  $maintenance
     * @return \Illuminate\Http\Response
     */
    public function edit($id) 
    {
        $maintenance = Maintenance::findOrFail($id);
        $maintenance_routines = maintenanceroutine::pluck('title', 'id');
        $vehicles = Vehicle::all();
        return view('maintenance.edit', compact('maintenance', 'maintenance_routines', 'vehicles'));
    
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Maintenance  $maintenance
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        
        $this->validator($request->all())->validate();
        $maintenance = Maintenance::findOrFail($id);
        $maintenance->maintenance_routine_id = $request->maintenance_routine_id;
        $maintenance->vehicle_id = $request->vehicle_id;
        $maintenance->maintenance_cost = $request->maintenance_cost;   
        $maintenance->maintenance_date = $request->maintenance_date;
        $maintenance->remark =  $request->remark;
        $maintenance->status = 1;
        $maintenance->update();
        //dd($maintenance);
        Session::flash('message', __('Maintenance updated successfully'));
        return redirect('maintenance');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Maintenance  $maintenance
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Maintenance::findOrFail($id)->delete();
        return redirect()->back();
    }

    protected function validator(Array $data)
    {
        return Validator::make($data, [
            'maintenance_routine_id'=>'required|integer|exists:maintenance_routines,id',
            'vehicle_id'=>'required|integer|exists:vehicles,id',
            'maintenance_cost'=>'required|numeric|max:9999999999',
            'remark'=>'max:100'
        ]);
    }
}
