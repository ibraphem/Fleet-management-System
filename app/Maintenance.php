<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\vehicle;
use App\Maintenanceroutine;

class Maintenance extends Model
{
    protected $fillable = ['maintenance_routine_id', 'maintenance_cost', 'vehicle_id', 'remark'];

    public function vehicle()
    {
        return $this->belongsTo('App\Vehicle');
    }

    public function maintenance_routine()
    {
    	return $this->belongsTo('App\MaintenanceRoutine');
    }
}
