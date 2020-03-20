<?php

namespace App\Http\Controllers;

use App\Accidentreport;
use App\Accident;
use Illuminate\Http\Request;

class AccidentreportController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
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
        //dd("nonsense");
        if ($request->ajax()) {
           // dd("nonsense");
            $accidentReport = Accident::where('accident_date', '>=', $request->DateCreated);
            $accidentReport = $accidentReport->where('accident_date', '<=', $request->EndDate)->get();
            //dd($accidentReport);
            return view('report.listsaccident')->with('accidentReport', $accidentReport);
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
