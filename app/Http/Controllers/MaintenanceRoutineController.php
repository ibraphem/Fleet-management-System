<?php

namespace App\Http\Controllers;

use App\Maintenance;
use App\MaintenanceRoutine;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class MaintenanceRoutineController extends Controller
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
        $maintenance_routines = MaintenanceRoutine::with('maintenance')->latest()->get();
        return view('maintenance.maintenanceroutine')->with('maintenance_routines', $maintenance_routines);
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
        $input = $request->all();
        $this->validator($input)->validate();
        $input['slug'] = str_slug($request->title);
        MaintenanceRoutine::create($input);
        Session::flash('message', __('Maintenance routine added successfully!'));
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\MaintenanceRoutine  $maintenanceRoutine
     * @return \Illuminate\Http\Response
     */
        public function show($id)
        {   
            
            $maintenance_routine = MaintenanceRoutine::findOrFail($id);
            $maintenance = Maintenance::where('maintenance_routine_id', $id)->get();
            
            return view('maintenance.parts', compact('maintenance_routine', 'maintenance')); 
        }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\MaintenanceRoutine  $maintenanceRoutine
     * @return \Illuminate\Http\Response
     */

    protected function validator(Array $data)
    {
        return Validator::make($data, [
            'title'=>'required|max:150'
        ]);
    }

    public function edit(MaintenanceRoutine $maintenanceRoutine)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\MaintenanceRoutine  $maintenanceRoutine
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, MaintenanceRoutine $maintenanceRoutine)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\MaintenanceRoutine  $maintenanceRoutine
     * @return \Illuminate\Http\Response
     */
    public function destroy(MaintenanceRoutine $maintenanceRoutine)
    {
        //
    }
}
