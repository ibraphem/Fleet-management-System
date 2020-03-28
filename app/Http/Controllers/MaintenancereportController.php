<?php

namespace App\Http\Controllers;

use App\Maintenancetreport;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Maintenance;
use \Auth, \Redirect;
use Carbon\Carbon;
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
        //dd("nonsense");
        if ($request->ajax()) {
            //dd("nonsense");
            $maintenanceReport = Maintenance::where('maintenance_date', '>=', $request->DateCreated);
            $maintenanceReport = $maintenanceReport->where('maintenance_date', '<=', $request->EndDate);
            $maintenanceReport = $maintenanceReport->where('status', '=', 1)->get();
            //dd($maintenanceReport);
            return view('report.listsmaintenance')->with('maintenanceReport', $maintenanceReport);
        }
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
