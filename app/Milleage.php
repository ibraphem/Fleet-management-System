<?php

use App\vehicle;
use App\vehicleuser;
namespace App;

use Illuminate\Database\Eloquent\Model;

class Milleage extends Model
{
    protected $fillable = ['date','vehicle_id', 'vehicle_user_id', 'starting_milleage', 'ending_milleage', 'milleage_ceiling'];

    public function vehicle()
    {
        return $this->belongsTo('App\Vehicle');
    }

    public function assignment()
    {
        return $this->belongsTo('App\Assignment', 'assignment_id');
    }

    public function accident()
    {
        return $this->belongsTo('App\Accident', 'accident_id');
    }

    public function vehicleuser()
    {
        return $this->belongsTo('App\Vehicleuser', 'vehicle_user_id');
    }

    public function other()
    {
        return $this->belongsTo('App\Other', 'other_id');
    }
}
