<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\vehicle;
use App\vehicleuser;
use App\Accident;
use App\Document;
use App\Fuel;
use App\Milleage;
use App\Maintenance;

class Assignment extends Model
{
    const SELECT_VEHICLE = "DM 652109"; 

    protected $table = 'assignments';
    
    protected $fillable = ['vehicle_user_id', 'vehicle_id', 'assignment_date'];

    public function vehicle()
    {
        return $this->belongsTo('App\Vehicle');
    }

    public function vehicleuser()
    {
    	return $this->belongsTo('App\Vehicleuser', 'vehicle_user_id'); 
    }

     public function milleage()
    {
        return $this->belongsTo('App\Milleage', 'milleage_id');
    }

    public function document()
    {
        return $this->belongsTo('App\Document');
    }

    public function fuel()
    {
        return $this->belongsTo('App\Fuel');
    }

    public function Accident()
    {
        return $this->belongsTo('App\Accident');
    }

    public function maintenance()
    {
        return $this->belongsTo('App\Maintenance');
    }

}
