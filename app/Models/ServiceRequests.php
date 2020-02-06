<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ServiceRequests extends Model {
	use SoftDeletes;
  protected $guarded = ['id'];
  protected $dates = ['deleted_at'];

  public function vehicle_model()
    {
        return $this->hasOne('App\Models\VehicleModels', 'id', 'vehicle_model_id');
    }
}
