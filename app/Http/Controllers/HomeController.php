<?php namespace App\Http\Controllers;


use App\Maintenance;
use App\Assignment;
use App\Accident;
use App\Document;
use App\Vehicle;
use App\Vehicleuser;
use App;

use Carbon\Carbon;

class HomeController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Home Controller
    |--------------------------------------------------------------------------
    |
    | This controller renders your application's "dashboard" for users that
    | are authenticated. Of course, you are free to change or remove the
    | controller as you wish. It is just here to get your app started!
    |
    */

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard to the user.
     *
     * @return Response
     */
    public function index()
    {
     
        
        $year = date('Y');
        $month = date('m');

        $vehicleusers = Vehicleuser::count();

        $vehicles = Vehicle::count();

        $assignments = Assignment::count();

        $unallocated_vehicles = $vehicles - $assignments;

        $accidentals = Accident::count();

        $schedule_maintenances = Maintenance::where('status', '=', 0)->with('vehicle','maintenance_routine')->orderBy('schedule_date', 'ASC')->get();

        $assignments = Assignment::where('status', '=', "active")->with('vehicle','vehicleuser')->orderBy('assignment_date', 'ASC')->get();

        $accidents = Accident::with('vehicle','vehicleuser')->orderBy('accident_date', 'ASC')->get();

        $documents = Document::whereYear('expiry_date', '=', $year);
        $documents = $documents->whereMonth('expiry_date', '=', $month);
        $documents = $documents->orderBy('expiry_date', 'ASC')->get();

       

        return view('home')
            ->with('schedule_maintenances', $schedule_maintenances)
            ->with('vehicles', $vehicles)
            ->with('accidentals', $accidentals)
            ->with('vehicleusers', $vehicleusers)
            ->with('accidents', $accidents)
            ->with('documents', $documents)
            ->with('unallocated_vehicles', $unallocated_vehicles)
            ->with('assignments', $assignments);
            
    }


}
