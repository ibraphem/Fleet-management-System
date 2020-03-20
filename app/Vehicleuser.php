<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Http\Controllers\Traits\FileUploadTrait;

class Vehicleuser extends Model
{
    use FileUploadTrait;
    const Vehicle_user = "Vehicle User"; 

    protected $fillable = ['full_name', 'department', 'designation', 'phone', 'email', 'address'];

  /*  public function customerPayments()
    {
        return $this->hasMany('App\CustomerPayment');
    } */
    
    public function saveVehicleUser(Array $data)
    {
        $this->full_name = $data['full_name'];
        $this->department = $data['department']; 
        $this->designation = $data['designation'];
        $this->phone = $data['phone'];
        $this->email = $data['email'];
        $this->address = $data['address'];
        $this->city = (isset($data['city'])) ? $data['city'] : "";
        $this->country = (isset($data['country'])) ? $data['country'] : "";
        $this->save();
    }

    public function saveVehicleUserAvatar($image)
    {
        $avatarName = $this->uploadImage($image, 'images/vehicleUsers/');
        $this->avatar = $avatarName;
        $this->save();
    }


}
