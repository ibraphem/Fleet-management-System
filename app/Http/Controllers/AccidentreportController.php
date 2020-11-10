<?php

namespace App\Http\Controllers;

use App\Accidentreport;
use App\Accident;
use Illuminate\Http\Request;
use \Auth, \Redirect;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class AccidentreportController extends Controller
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
 
    public function getAccident()
    {
        $accidentReport = Accident::pluck('created_at');
        //dd($accidentReport);
        return view('report.getaccident')->with('accidentReport', $accidentReport);
    }

    public function getAccidentReport(Request $request)
    {
//dd($request->company);
        $from = $request->from;
        $to = $request->to;
        $company = $request->company;
         $accidents = DB::table('accidents')
        ->join('vehicles', 'accidents.vehicle_id', '=', 'vehicles.id')
        ->where('vehicles.location', $request->company)
        ->whereBetween('accidents.accident_date', array($request->from, $request->to))
        
        ->select('accidents.*', 'vehicles.*')
        ->get();

       // dd($accidents);

     

        return view('report.listsaccident')
        ->with('accidents', $accidents)
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
     * @param  \App\Accidentreport  $accidentreport
     * @return \Illuminate\Http\Response
     */
    public function show(Accidentreport $accidentreport)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Accidentreport  $accidentreport
     * @return \Illuminate\Http\Response
     */
    public function edit(Accidentreport $accidentreport)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Accidentreport  $accidentreport
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Accidentreport $accidentreport)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Accidentreport  $accidentreport
     * @return \Illuminate\Http\Response
     */
    public function destroy(Accidentreport $accidentreport)
    {
        //
    }
}
