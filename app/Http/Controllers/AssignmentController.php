<?php

namespace App\Http\Controllers;
use App\Vehicleuser;
use App\Vehicle;
use App\Assignment;
use App\Accident;
use App\Document;
use App\Milleage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class AssignmentController extends Controller
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
       // $assignments = Assignment::with('vehicle','vehicleuser')->latest()->get();
       $assignments = Assignment::where('status', '=', "active")->with('vehicle','vehicleuser', 'accident', 'document', 'milleage')->orderBy('assignment_date', 'ASC')->get();
       //dd($assignments);
        return view('assignment.index', compact('assignments')); 

       
    }

  

    

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $vehicle_users = Vehicleuser::all();
        $vehicles = Vehicle::all();
        
        return view('assignment.edit', compact('vehicle_users', 'vehicles'));
    
    }




    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       // $this->validator($request->all())->validate();
        $assignment = new Assignment();
        $assignment->vehicle_user_id = $request->vehicle_user_id;
        $assignment->vehicle_id = $request->vehicle_id;
    
        $assignment->assignment_date = $request->assignment_date;
   
        $vehicle_assigned = Assignment::where('vehicle_id', $request->vehicle_id)->exists();
        if($vehicle_assigned || $assignment->status == "active"){
            Session::flash('message', __('Vehicle is already assigned to another user'));
            return redirect()->back();
        } else{
        $assignment->save();
        Session::flash('message', __('Vehicle assigned successfully'));
        return redirect('assignment');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Assignment  $assignment
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
       
    }

    public function withdrawal(Request $request)
    {
        $assignment = Assignment::findOrFail($request->ass_id);
       // dd($assignment);
        $assignment->withdrawal_date =$request->withdrawal_date;
        $assignment->status = "inactive";
        $assignment->update();
        Session::flash('message', __('Vehicle was withdrew successfully'));
        return redirect('assignment');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Assignment  $assignment
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $assignment = Assignment::findOrFail($id);
       // dd($assignment);
        $vehicle_users = Vehicleuser::all();
        $vehicles = Vehicle::all();
       return view('assignment.edit', compact('assignment', 'vehicle_users', 'vehicles'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Assignment  $assignment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
       // dd('nonsense');
       // $this->validator($request->all())->validate();
        $assignment = Assignment::findOrFail($id);
       // dd($assignment);
        $assignment->vehicle_user_id = $request->vehicle_user_id;
        $assignment->vehicle_id = $request->vehicle_id;
       
        $assignment->assignment_date = $request->assignment_date;
        //dd($assignment);
        $vehicle_assigned = Assignment::where('vehicle_id', $request->vehicle_id)->exists();
        if($vehicle_assigned || $assignment->status == "active"){
            Session::flash('message', __('Vehicle is already assigned to another user'));
            return redirect()->back();
        } else{
        $assignment->update();
        Session::flash('message', __('Update Successful'));
        return redirect('assignment');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Assignment  $assignment
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Assignment::findOrFail($id)->delete();
        return redirect()->back();
    }

    protected function validator(Array $data)
    {
        return Validator::make($data, [
            'vehicle_user_id'=>'required|integer|exists:vehicle_users,id',
            'vehicle_id'=>'required|integer|exists:vehicles,id',
            'remark'=>'max:100'
        ]);
    }
}
