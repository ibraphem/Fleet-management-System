<?php

namespace App\Http\Controllers;

use App\Maintenance;
use App\MaintenanceRoutine;
use App\Vehicle;
use App\Document;
use App\VehiclePaper;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\Facades\Datatables;
use \Redirect;

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
      //  $maintenances = Maintenance::where('status', '=', 1)->with('vehicle','maintenance_routine')->get();
        //$maintenances = Maintenance::with('vehicle','maintenance_routine')->latest()->get();
     //   dd($maintenances);
        return view('maintenance.index');

     
    }

    public function maint() {
        return Datatables::of(Maintenance::query()->with('vehicle', 'maintenance_routine')->where('status', '=', 1))
        ->addColumn('action', function($data){
            $button ='<a href="maintenance/'. $data->id .'/edit"><button class="btn btn-warning btn-sm" id="'. $data->id .'">Edit</button></a>';
           
            return $button; 
        })
        ->rawColumns(['action'])
       ->make(true);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $maintenance_routines = MaintenanceRoutine::all();
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
       // dd(5);
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
        $maintenance_routines = MaintenanceRoutine::all();
        $vehicles = Vehicle::all();

      //  dd($maintenance_routines);
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

    public function getExpense(Request $request){
        $id = $request->eid;
       // dd($id);
        return view('report.getexpense')->with('id', $id);
    }

    public function report(Request $request) {

        
        $vehicle = vehicle::findOrFail($request->id);
      //  dd($vehicle);
        $maintenance_routine = MaintenanceRoutine::all();
        $maint_report = Maintenance::where('vehicle_id', $request->id);
        $maint_report = $maint_report->where('status', '=', 1);
        $maint_report = $maint_report->orderBy('maintenance_date', 'ASC')->get();
      //  dd($maint_report);
        return view('report.vehiclemaint', compact('vehicle', 'maint_report', 'maintenance_routine')); 
        
    }

    public function expense(Request $request) {

      //  dd($request->eid);
        $from = $request->from;
        $to = $request->to;
        $vehicle = vehicle::findOrFail($request->id);
     
        $maint_report = Maintenance::where('vehicle_id', $request->id);
        $maint_report = $maint_report->where('status', '=', 1);
        $maint_report = $maint_report->where('maintenance_date', '>=', $from);
        $maint_report = $maint_report->where('maintenance_date', '<=', $to);
        $maint_report = $maint_report->orderBy('maintenance_date', 'ASC')->get();

        $maintenance_routine = MaintenanceRoutine::all();

        $doc_report = Document::where('vehicle_id', $request->id);
        $doc_report = $doc_report->where('acquired_date', '>=', $from);
        $doc_report = $doc_report->where('acquired_date', '<=', $to);
        $doc_report = $doc_report->orderBy('acquired_date', 'ASC')->get();

        $maint_sum = DB::table('maintenances')->where('vehicle_id', $request->id)
        ->whereBetween('maintenance_date', array($from, $to))->sum('maintenance_cost');

        $doc_sum = DB::table('documents')->where('vehicle_id', $request->id)
        ->whereBetween('acquired_date', array($from, $to))->sum('cost');

        $grand_total = $maint_sum + $doc_sum;

       // dd($doc_sum);
        
        $vehiclepaper = VehiclePaper::all();

      //  dd($doc_report);

        return view('report.expenses')
        ->with('vehicle', $vehicle)
        ->with('from', $from)
        ->with('to', $to)
        ->with('maint_report', $maint_report)
        ->with('doc_report', $doc_report)
        ->with('maintenance_routine', $maintenance_routine)
        ->with('vehiclepaper', $vehiclepaper)
        ->with('doc_sum', $doc_sum)
        ->with('maint_sum', $maint_sum)
        ->with('grand_total', $grand_total);


     //   dd($vehicle_paper);
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
