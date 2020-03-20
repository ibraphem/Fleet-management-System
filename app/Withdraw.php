<?php

namespace App;
use App\Assignment;
use App\Vehicle;

use Illuminate\Database\Eloquent\Model;

class Withdraw extends Model
{
    public function vehicle()
    {
        return $this->belongsTo('App\Vehicle', 'vehicle_id');
    }

    public function Assignment()
    {
        return $this->belongsTo('App\Assignment', 'vehicle_user_id');
    }
}
