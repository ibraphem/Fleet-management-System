<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Vehicle;
use App\Vehicleuser;
use App\Assignment;

class fuel extends Model
{
    protected $fillable = ['fuel_date', 'fuel_cost', 'vehicle_id', 'vehicle_user_id'];

    public function vehicle()
    {
        return $this->belongsTo('App\Vehicle');
    }

    public function assignment()
    {
        return $this->belongsTo('App\Assignment', 'assignment_id');
    }

    public function vehicleuser()
    {
        return $this->belongsTo('App\Vehicleuser', 'vehicle_user_id');
    }
}
