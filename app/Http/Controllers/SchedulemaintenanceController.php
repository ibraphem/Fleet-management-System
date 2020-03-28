<?php

namespace App\Http\Controllers;

use App\Schedulemaintenance;
use Illuminate\Http\Request;
use App\Maintenance;
use App\MaintenanceRoutine;
use App\Vehicle;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class SchedulemaintenanceController extends Controller
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
        $schedule_maintenances = Maintenance::where('status', '=', 0)->with('vehicle','maintenance_routine')->OrderBy('schedule_date', 'DESC')->get();
        return view('maintenance.schedulemaintenance', compact('schedule_maintenances'));
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
       return view('maintenance.schedulemaintenance_edit', compact('maintenance_routines', 'vehicles'));
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
        $schedule_maintenance = new Maintenance();
        $schedule_maintenance->maintenance_routine_id = $request->maintenance_routine_id;
        $schedule_maintenance->vehicle_id = $request->vehicle_id;
        $schedule_maintenance->schedule_date = $request->schedule_date;
        $schedule_maintenance->status = 0;
        $schedule_maintenance->save();
        Session::flash('message', __('Maintenance was scheduled'));
        return redirect('schedulemaintenance');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Schedulemaintenance  $schedulemaintenance
     * @return \Illuminate\Http\Response
     */
    public function show(Schedulemaintenance $schedulemaintenance)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Schedulemaintenance  $schedulemaintenance
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $schedule_maintenance = Maintenance::findOrFail($id);
        $maintenance_routines = maintenanceroutine::pluck('title', 'id');
        $vehicles = Vehicle::all();
        return view('maintenance.schedulemaintenance_edit', compact('schedule_maintenance', 'maintenance_routines', 'vehicles'));
    }

    public function complete(Request $request)
    {
        $schedulemaintenance = Maintenance::findOrFail($request->maint_id);
        $schedulemaintenance->maintenance_date =$request->maintenance_date;
        $schedulemaintenance->maintenance_cost =$request->maintenance_cost;
        $schedulemaintenance->remark =$request->remark;
        $schedulemaintenance->status = 1;
        $schedulemaintenance->update();
        Session::flash('message', __('Maintenance Completed successfully'));
        return redirect()->back(); 
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Schedulemaintenance  $schedulemaintenance
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validator($request->all())->validate();
        $schedule_maintenance = Maintenance::findOrFail($id);
        $schedule_maintenance->maintenance_routine_id = $request->maintenance_routine_id;
        $schedule_maintenance->vehicle_id = $request->vehicle_id;
        $schedule_maintenance->schedule_date = $request->schedule_date;
        $schedule_maintenance->status = 0;
        $schedule_maintenance->save();
        Session::flash('message', __('Maintenance was scheduled'));
        return redirect('schedulemaintenance');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Schedulemaintenance  $schedulemaintenance
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
            'vehicle_id'=>'required|integer|exists:vehicles,id'
            
            
        ]);
    }
}
