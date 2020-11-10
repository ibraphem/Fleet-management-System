<?php

namespace App\Http\Controllers;

use App\vehiclereport;
use Illuminate\Http\Request;
use App\Vehicle;
use \Auth, \Redirect;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class vehiclereportController extends Controller
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
       
    }

    public function getVehicle()
    {
        $vehicleReport = Vehicle::pluck('created_at');
        return view('report.getvehicle')->with('vehicleReport', $vehicleReport);
    }

    public function getVehicleReport(Request $request)
    {
           // dd($request->company);
            $from = $request->from;
            $to = $request->to;
            $company = $request->company;
            $vehicleReport = Vehicle::where('acquired_date', '>=', $request->from);
            $vehicleReport = $vehicleReport->where('acquired_date', '<=', $request->to);
            $vehicleReport = $vehicleReport->where('location', '=', $request->company);
            
            $vehicleReport = $vehicleReport->orderBy('acquired_date', 'ASC')->get();
        
        
            return view('report.listsvehicle')
            ->with('vehicleReport', $vehicleReport )
            ->with('from', $from)
            ->with('to', $to)
            ->with('company', $company); 
       
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
     * @param  \App\vehiclereport  $vehiclereport
     * @return \Illuminate\Http\Response
     */
    public function show(vehiclereport $vehiclereport)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\vehiclereport  $vehiclereport
     * @return \Illuminate\Http\Response
     */
    public function edit(vehiclereport $vehiclereport)
    {
        // 
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\vehiclereport  $vehiclereport
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, vehiclereport $vehiclereport)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\vehiclereport  $vehiclereport
     * @return \Illuminate\Http\Response
     */
    public function destroy(vehiclereport $vehiclereport)
    {
        //
    }
}
