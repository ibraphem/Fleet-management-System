<?php

namespace App\Http\Controllers;

use App\Maintenancereport;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Maintenance;
use App\Vehicle;
use \Auth, \Redirect;
use Illuminate\Support\Facades\DB;


class MaintenancereportController extends Controller
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
        //
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

    public function getMaintenance()
    {
        $maintenanceReport = Maintenance::pluck('created_at');
        //dd($maintenanceReport);
        return view('report.getmaintenance')->with('maintenanceReport', $maintenanceReport);
    }

    public function getMaintenanceReport(Request $request)
    {
       
            $from = $request->from;
            $to = $request->to;
            $company = $request->company;
            $maintenanceReport = DB::table('maintenances')->where('status', '=', '1')
            ->join('vehicles', 'maintenances.vehicle_id', '=', 'vehicles.id')
            ->join('maintenance_routines', 'maintenances.maintenance_routine_id', '=', 'maintenance_routines.id')
            ->where('vehicles.location', $request->company)
            ->whereBetween('maintenances.maintenance_date', array($request->from, $request->to))
            ->select('maintenances.*', 'vehicles.*', 'maintenance_routines.*')
            ->orderBy('maintenance_date', 'ASC')
            ->get();
          // dd($maintenanceReport);
            return view('report.listsmaintenance')
            ->with('maintenanceReport', $maintenanceReport)
            ->with('from', $from)
            ->with('to', $to)
            ->with('company', $company);

        
    
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
     * @param  \App\Maintenancetreport  $maintenancetreport
     * @return \Illuminate\Http\Response
     */
    public function show(Maintenancetreport $maintenancetreport)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Maintenancetreport  $maintenancetreport
     * @return \Illuminate\Http\Response
     */
    public function edit(Maintenancetreport $maintenancetreport)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Maintenancetreport  $maintenancetreport
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Maintenancetreport $maintenancetreport)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Maintenancetreport  $maintenancetreport
     * @return \Illuminate\Http\Response
     */
    public function destroy(Maintenancetreport $maintenancetreport)
    {
        //
    }
}
