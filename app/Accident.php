<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\vehicle;
use App\vehicleuser;
use App\Assignment;


class Accident extends Model
{

    protected $fillable = ['vehicle_user_id', 'vehicle_id', 'repair_cost', 'accident_date', 'time'];

    public function vehicle()
    {
        return $this->belongsTo('App\Vehicle');
    }

    public function vehicleuser()
    {
    	return $this->belongsTo('App\Vehicleuser', 'vehicle_user_id');
    }

  
}
