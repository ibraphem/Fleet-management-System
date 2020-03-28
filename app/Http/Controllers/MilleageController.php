<?php

namespace App\Http\Controllers;

use DB;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use App\Milleage;
use App\Vehicle;
use App\Vehicleuser;
use App\Assignment;
use App\Accident;
use App\Other;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class MilleageController extends Controller
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
        $others = Other::all();
        //$others = $others->where('id', '=', 1)->get(); 
        $milleages = Milleage::with('vehicle','vehicleuser', 'accident', 'assignment')->latest()->get();

        //dd($others);
        
       return view('milleage.index', compact('milleages', 'others')); 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   
      
        $vehicles = Vehicle::all();
        $vehicle_users = Vehicleuser::all();
        return view('milleage.edit', compact('vehicle_users', 'vehicles'));
    }

    public function costchange(Request $request) {

        $others = Other::findOrFail($request->cost_id);
        $others->cost =$request->cost;
        $others->update();
        Session::flash('message', __('Excess milleage charge updated'));
        return redirect('milleage');

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
        $milleage = new Milleage();
        $milleage_charge = Other::findOrFail(1);
        $milleage_charge = $milleage_charge->cost;
        //dd($milleage_charge);
        $milleage->vehicle_user_id = $request->vehicle_user_id; 
        $milleage->vehicle_id = $request->vehicle_id;
        $milleage->date = $request->date;
        $date = strtotime($milleage->date);
        $month = date("m", $date);
        $year = date("Y", $date);
        $milleage_year =DB::table('Milleages')
                                    ->whereRaw('extract(month from date) = ?', [$month])
                                    ->whereRaw('extract(year from date) = ?', [$year])
                                    ->count();
       // dd($milleage_year);

        
        $milleage->milleage_ceiling =  $request->milleage_ceiling;
        $milleage->starting_milleage = $request->starting_milleage;
        $milleage->ending_milleage =  $request->ending_milleage;
        $milleage_used = $request->starting_milleage - $request->ending_milleage;
        $milleage->milleage_used = $milleage_used;
        if($milleage_used > $request->milleage_ceiling){
            $excess_milleage = $milleage_used - $request->milleage_ceiling;
            $milleage->excess_milleage = $excess_milleage;
            $milleage->excess_milleage_charge = $excess_milleage * $milleage_charge;
        } else {
            $milleage->excess_milleage = 0;
            $milleage->excess_milleage_charge = 0;
        }

        $milleage_date =DB::table('Milleages')
                                    ->where('vehicle_id', '=', $request->vehicle_id)
                                    ->whereRaw('extract(month from date) = ?', [$month])
                                    ->whereRaw('extract(year from date) = ?', [$year])
                                    ->count();

          if($milleage_date > 0){
            Session::flash('message', __('You have already recorded milleage for this vehicle this month'));
            return redirect()->back();
          }                  
        
        $vehicle_assigned_count = DB::table('assignments')
                                    ->where('vehicle_id', '=', $request->vehicle_id)
                                    ->where('vehicle_user_id', '=', $request->vehicle_user_id)
                                    ->count();
        //dd($vehicle_assigned_count);
        if($vehicle_assigned_count > 0){
        $milleage->save();
        Session::flash('message', __('Milleage recorded successfully'));
        return redirect('milleage');
        }else{
            Session::flash('message', __('This vehicle was not assigned to the user you chose'));
            return redirect()->back();
            die();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Milleage  $milleage
     * @return \Illuminate\Http\Response
     */
    public function show(Milleage $milleage)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Milleage  $milleage
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $milleage = Milleage::findOrFail($id);
        $vehicle_users = Vehicleuser::all();
       // dd($vehicle_users);
        $vehicles = Vehicle::all();
       return view('milleage.edit', compact('milleage', 'vehicle_users', 'vehicles'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Milleage  $milleage
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //dd('nonsense');
     //   $this->validator($request->all())->validate();
        $milleage = Milleage::findOrFail($id);
       
        $milleage->vehicle_user_id = $request->vehicle_user_id; 
        $milleage->vehicle_id = $request->vehicle_id;
        $milleage->date = $request->date;
        //dd($milleage->year);
        $milleage->milleage_ceiling =  $request->milleage_ceiling;
       // dd($milleage->milleage_ceiling);
        $milleage->starting_milleage = $request->starting_milleage;
        $milleage->ending_milleage =  $request->ending_milleage;
        $milleage_used = $request->starting_milleage - $request->ending_milleage;
        $milleage->milleage_used = $milleage_used;
        if($milleage_used > $request->milleage_ceiling){
            $excess_milleage = $milleage_used - $request->milleage_ceiling;
            $milleage->excess_milleage = $excess_milleage;
            $milleage->excess_milleage_charge = $excess_milleage * 100;
        } else {
            $milleage->excess_milleage = 0;
            $milleage->excess_milleage_charge = 0;
        }

        $vehicle_assigned_count = DB::table('assignments')
        ->where('vehicle_id', '=', $request->vehicle_id)
        ->where('vehicle_user_id', '=', $request->vehicle_user_id)
        ->count();
        //dd($vehicle_assigned_count);
        if($vehicle_assigned_count > 0){
        $milleage->update();
        Session::flash('message', __('Update Successful'));
        return redirect('milleage');
        }else{
        Session::flash('message', __('This vehicle was not assigned to the user you chose'));
        return redirect()->back();
        }
      
    }
    

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Milleage  $milleage
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Milleage::findOrFail($id)->delete();
        return redirect()->back();
    }

    protected function validator(Array $data)
    {
        return Validator::make($data, [
            //'vehicle_user_id'=>'required|integer|exists:vehicle_users,id',
            'vehicle_id'=>'required|integer|exists:vehicles,id',
        ]);
    }
}
