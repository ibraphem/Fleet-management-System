<?php

namespace App\Http\Controllers;

use App\vehiclereport;
use App\Accident;
use App\Maintenance;
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
        $vehiclesReport = Vehicle::latest()->paginate('10');


        return view('reports.vehicle')->with('vehiclesReport', $vehiclesReport);
    }

    public function getVehicle()
    {
        $vehicleReport = Vehicle::pluck('created_at');
        //dd($vehicleReport);
        return view('report.getvehicle')->with('vehicleReport', $vehicleReport);
    }

    public function getVehicleReport(Request $request)
    {
        //dd('nonsense');
        if ($request->ajax()) {
            //dd('nonsense');
            //dd($request->EndDate);
            $accident = Accident::all();
            $maintenance = Maintenance::all();
            $vehicleReport = Vehicle::with('accident', 'maintenance')->where('acquired_date', '>=', $request->DateCreated);
            $vehicleReport = $vehicleReport->where('acquired_date', '<=', $request->EndDate)->get();
           // $vehicleReport = Vehicle::all()->whereBetween('created_at', [ $request->DateCreated.' 00:00:00', $request->EndDate.' 23:59:59'])->get();
          //  dd($vehicleReport);
            return view('report.listsvehicle')->with('vehicleReport', $vehicleReport); 
        }
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
