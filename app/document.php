<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\vehicle;
use App\vehicleuser;
use App\Assignment;

class document extends Model
{
    protected $fillable = ['title', 'acquired_date', 'expiry_date', 'cost', 'vehicle_id', 'vehicle_user_id'];

    public function vehicle()
    {
        return $this->belongsTo('App\Vehicle');
    }

    public function vehicleuser()
    {
    	return $this->belongsTo('App\Vehicleuser', 'vehicle_user_id');
    }
}
