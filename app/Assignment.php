<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\vehicle;
use App\vehicleuser;

class Assignment extends Model
{
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

}
