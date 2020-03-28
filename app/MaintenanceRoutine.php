<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MaintenanceRoutine extends Model
{
    const GENERAL_MAINTENANCE = "General Maintenance";
    protected $fillable = ['title', 'slug', 'description'];

    public function maintenance()
    {
    	return $this->hasMany('App\maintenance')->where('status', '=', 1);
    }

    public function getAll()
    {
        $maintenance_routine_array = [];
        $maintenance_routines = MaintenanceRoutine::all();
        if (!empty($maintenances_routine)) {
            foreach ($maintenance_routines as $value) {
                $maintenance_routine_array[$value->id] = $value;
            }
        }
        return $maintenance_routine_array;
    }
}
