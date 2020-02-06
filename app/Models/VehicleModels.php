<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class VehicleModels extends Model {
  protected $guarded = ['id'];

  public function vehicle_make()
    {
        return $this->hasOne('App\Models\VehicleMakes', 'id', 'vehicle_make_id');
    }
}
