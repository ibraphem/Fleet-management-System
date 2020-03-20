<?php

namespace App\Http\Controllers;

use App\document;
use Illuminate\Http\Request;
use App\Vehicle;
use App\Vehicleuser;
use App\Assignment;
use \Auth;
use \Redirect;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;

class DocumentController extends Controller
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
        $documents = Document::with('vehicle','vehicleuser')->latest()->get();
        return view('document.index', compact('documents')); 
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
        return view('document.edit', compact('vehicle_users', 'vehicles'));
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
        $document = new Document();
        $document->vehicle_id = $request->vehicle_id;
        $document->vehicle_user_id = $request->vehicle_user_id;
        $document->title = $request->title;
        $document->acquired_date = $request->acquired_date;
        $document->expiry_date = $request->expiry_date;
        $document->cost = $request->cost;

        $vehicle_assigned = Assignment::where('vehicle_id', $request->vehicle_id)->exists();
        
        $vehicle_assigned_count = DB::table('assignments')
        ->where('vehicle_id', '=', $request->vehicle_id)
        ->where('vehicle_user_id', '=', $request->vehicle_user_id)
        ->count();
        if($vehicle_assigned_count > 0){
            $document->save();
            Session::flash('message', __('New Document added'));
            return redirect('document');
            }else{
                Session::flash('message', __('This vehicle was not assigned to the user you chose'));
                return redirect()->back();
            }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\document  $document
     * @return \Illuminate\Http\Response
     */
    public function show(document $document)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\document  $document
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $document = Document::findOrFail($id);
        //dd($document);
        $vehicle_users = Vehicleuser::all();
        $vehicles = Vehicle::all();
       return view('document.edit', compact('document', 'vehicle_users', 'vehicles'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\document  $document
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validator($request->all())->validate();
        $document = new Document();
        $document->vehicle_id = $request->vehicle_id;
        $document->vehicle_user_id = $request->vehicle_user_id;
        $document->title = $request->title;
        $document->acquired_date = $request->acquired_date;
        $document->expiry_date = $request->expiry_date;
        $document->cost = $request->cost;

        $vehicle_assigned = Assignment::where('vehicle_id', $request->vehicle_id)->exists();
        
        $vehicle_assigned_count = DB::table('assignments')
        ->where('vehicle_id', '=', $request->vehicle_id)
        ->where('vehicle_user_id', '=', $request->vehicle_user_id)
        ->count();
        if($vehicle_assigned_count > 0){
            $document->update();
            Session::flash('message', __('Document Updated'));
            return redirect('document');
            }else{
                Session::flash('message', __('This vehicle was not assigned to the user you chose'));
                return redirect()->back();
            }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\document  $document
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Document::findOrFail($id)->delete();
        return redirect()->back();
    }

    protected function validator(Array $data)
    {
        return Validator::make($data, [
           
            'vehicle_id'=>'required|integer|exists:vehicles,id',
         
        ]);
    }
}
