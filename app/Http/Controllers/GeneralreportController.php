<?php

namespace App\Http\Controllers;

use App\Generalreport;
use Illuminate\Http\Request;
use App\vehicle;
use App\vehicleuser;
use App\Accident;
use App\Document;
use App\Fuel;
use App\Milleage;
use App\Maintenance;
use App\Assignment;
use \Auth, \Redirect;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class GeneralreportController extends Controller
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

    public function getGeneral()
    {
        $generalReport = Assignment::pluck('created_at');
        //dd($generalReport);
        return view('report.getgeneralreport')->with('generalReport', $generalReport);
    }

    public function getGeneralReport(Request $request)
    {
 
            $generalReport = Assignment::where('status', '=', "active")->with('vehicle','vehicleuser', 'accident', 'document', 'milleage')->get();
           
            $DateCreated = $request->from;
            $EndDate = $request->to;
            $company = $request->company;
         //   dd($company);


            $month_start = date("m",strtotime($DateCreated));
            $month_end = date("m",strtotime($EndDate));
            $year_start = date("Y",strtotime($DateCreated));
            $year_end = date("Y",strtotime($EndDate));


            if($DateCreated != null && $DateCreated != "" && $EndDate != null && $EndDate != "") {
                if($month_start == $month_end && $year_start == $year_end) {
                    
                        return view('report.listsgeneral', compact('generalReport', 'month_start', 'year_start', 'DateCreated', 'EndDate', 'company'));
            
                    
                } else {
                    echo "<h3 style='text-align:center; color:red'>Only monthly report can be generated, ensure that date range is between a month</h3>";
                }
            }

    
           
         
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Generalreport  $generalreport
     * @return \Illuminate\Http\Response
     */
    public function show(Generalreport $generalreport)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Generalreport  $generalreport
     * @return \Illuminate\Http\Response
     */
    public function edit(Generalreport $generalreport)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Generalreport  $generalreport
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Generalreport $generalreport)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Generalreport  $generalreport
     * @return \Illuminate\Http\Response
     */
    public function destroy(Generalreport $generalreport)
    {
        //
    }
}
