<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Schedulemaintenance extends Model
{
    protected $fillable = ['maintenance_routine_id', 'maintenance_cost', 'vehicle_id', 'schedule_date', 'status'];

    public function vehicle()
    {
        return $this->belongsTo('App\Vehicle');
    }

    public function maintenance_routine()
    {
    	return $this->belongsTo('App\MaintenanceRoutine');
    }

    public function maintenance()
    {
    	return $this->belongsTo('App\Maintenance');
    }
}
