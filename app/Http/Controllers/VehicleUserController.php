<?php

namespace App\Http\Controllers;

use App\Milleage;
use App\Vehicleuser;
use App\Assignment;
use App\Fuel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use Image;
use \Auth;
use \Redirect;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Session;
use App\Http\Controllers\Traits\FileUploadTrait;

class VehicleUserController extends Controller
{
    use FileUploadTrait;

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
        $vehicleusers = Vehicleuser::where(['type'=>1])->latest()->get();
        return view('vehicleuser.index')->with('vehicleuser', $vehicleusers);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('vehicleuser.edit');
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
        // store
        $vehicleusers = new Vehicleuser;
        $vehicleusers->saveVehicleUser($request->all());

        // process image
        $image = $request->file('avatar');
        if (isset($image)) {
            $vehicles->saveVehicleUserAvatar($image);
        }
        Session::flash('message', __('You have successfully added a vehicle user'));
        return Redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Vehicleuser  $vehicleuser
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {   
        
        $vehicle_user = Vehicleuser::findOrFail($id);
        $milleages = Milleage::where('vehicle_user_id', $id)->get();
        $assignments = Assignment::where('vehicle_user_id', $id)->get();
        $fuels = Fuel::where('vehicle_user_id', $id)->get();
        return view('vehicleuser.show', compact('vehicle_user', 'milleages', 'assignments', 'fuels'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Vehicleuser  $vehicleuser
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $vehicleusers = Vehicleuser::find($id);
        return view('vehicleuser.edit')
            ->with('vehicleuser', $vehicleusers);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Vehicleuser  $vehicleuser
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validator($request->all())->validate();
        $vehicleusers = Vehicleuser::find($id);
        $vehicleusers->saveVehicleUser($request->all());
        // process avatar
        $image = $request->file('avatar');
        if (isset($image)) {
            if (file_exists($vehicleusers->avatar) && $vehicleusers->avatar != 'no-foto.png') {
                unlink($vehicleusers->avatar);
            }
            $vehicleusers->saveVehicleUserAvatar($image);
        }
        // redirect
        Session::flash('message', __('You have successfully updated vehicle user'));
        return Redirect::to('vehicleusers');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Vehicleuser  $vehicleuser
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            $vehicleusers = Vehicleuser::find($id);
            $vehicleusers->delete();
            // redirect
            Session::flash('message', __('You have successfully deleted vehicle user'));
            return Redirect::to('vehicleusers');
        } catch (\Illuminate\Database\QueryException $e) {
            Session::flash('message', __('Integrity constraint violation: You Cannot delete a parent row'));
            Session::flash('alert-class', 'alert-danger');
            return Redirect::to('vehicleusers');
        }
    }
    
    protected function validator(Array $data)
    {
        return Validator::make($data, [
            'address'=>'max:200'
        ]);
    }
}
