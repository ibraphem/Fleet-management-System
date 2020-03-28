<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Http\Controllers\Traits\FileUploadTrait;

class Vehicle extends Model
{
    use FileUploadTrait;
    const Vehicle = "Vehicle"; 

    protected $fillable = ['reg_number', 'manufacturer', 'model', 'acquired_date', 'model_year'];

    
    public function saveVehicle(Array $data)
    {
        $this->reg_number = $data['reg_number'];
        $this->manufacturer = $data['manufacturer'];
        $this->model = $data['model'];
        $this->acquired_date = $data['acquired_date'];
       // $this->company = $data['company'];
        $this->model_year = (isset($data['model_year'])) ? $data['model_year'] : "";
        $this->purchase_price = (isset($data['purchase_price'])) ? $data['purchase_price'] : "";
        $this->life = (isset($data['life'])) ? $data['life'] : "";
        $this->location = (isset($data['location'])) ? $data['location'] : "";
        $this->condition = (isset($data['condition'])) ? $data['condition'] : "";
        $this->save();
    }

    public function saveVehicleAvatar($image)
    {
        $avatarName = $this->uploadImage($image, 'images/vehicles/');
        $this->avatar = $avatarName;
        $this->save();
    }

    public function accident()
    {
        return $this->hasMany('App\Accident');
    }

    public function maintenance()
    {
        return $this->hasMany('App\Maintenance');
    }


  
}
