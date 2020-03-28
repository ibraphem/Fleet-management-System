<?php

namespace App\Http\Controllers;

use App\Vehicle;
use App\Accident;
use App\Maintenance;
use App\Document;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use Image;
use \Auth;
use \Redirect;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Session;
use App\Http\Controllers\Traits\FileUploadTrait;

class VehicleController extends Controller
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
        $vehicles = Vehicle::where(['type'=>1])->latest()->get();
        return view('vehicle.index')->with('vehicle', $vehicles);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('vehicle.edit');
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
        $vehicles = new Vehicle;
        $vehicles->saveVehicle($request->all());

        // process image
        $image = $request->file('avatar');
        if (isset($image)) {
            $vehicles->saveVehicleAvatar($image);
        }
        Session::flash('message', __('You have successfully added a vehicle'));
        return Redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Vehicle  $vehicle
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $vehicle = Vehicle::findOrFail($id);
        $maintenance = Maintenance::where('status', '=', 1);
        $maintenance = $maintenance->where('vehicle_id', $id)->get();
        //$maintenance = $maintenance->where('status', '=', 1)->get();
        $accident = Accident::where('vehicle_id', $id)->get();
        $documents = Document::where('vehicle_id', $id)->get();
        return view('vehicle.show', compact('vehicle', 'maintenance', 'accident', 'documents'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Vehicle  $vehicle
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $vehicles = Vehicle::find($id);
        return view('vehicle.edit')
            ->with('vehicle', $vehicles);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Vehicle  $vehicle
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validator($request->all())->validate();
        $vehicles = Vehicle::find($id);
        $vehicles->saveVehicle($request->all());
        // process avatar
        $image = $request->file('avatar');
        if (isset($image)) {
            if (file_exists($vehicles->avatar) && $vehicles->avatar != 'no-foto.png') {
                unlink($vehicles->avatar);
            }
            $vehicles->saveVehicleAvatar($image);
        }
        // redirect
        Session::flash('message', __('You have successfully updated vehicle'));
        return Redirect::to('vehicles');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Vehicle  $vehicle
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            $vehicles = Vehicle::find($id);
            $vehicles->delete();
            // redirect
            Session::flash('message', __('You have successfully deleted vehicle'));
            return Redirect::to('vehicles');
        } catch (\Illuminate\Database\QueryException $e) {
            Session::flash('message', __('Integrity constraint violation: You Cannot delete a parent row'));
            Session::flash('alert-class', 'alert-danger');
            return Redirect::to('vehicles');
        }
    }

    protected function validator(Array $data)
    {
        return Validator::make($data, [
            'avatar'=>'mimes:jpeg,bmp,png|max:5120kb',
            'purchase_price'=>'max:9999999999999|numeric'
        ]);
    }
}
