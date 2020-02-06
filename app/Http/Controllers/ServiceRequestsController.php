<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ServiceRequests;
use App\Models\VehicleMakes;
use App\Models\VehicleModels;

class ServiceRequestsController extends Controller {

  /**
   * [Display a paginated list of Service Requests in the system]
   * @return view
   */
  public function index(){
    $requests = ServiceRequests::orderBy('updated_at','desc')->paginate(20);
    return view('index',compact('requests'));
  }
  /**
   * [This is the method you should use to show the edit screen]
   * @param  ServiceRequests $serviceRequest [get the object you are planning on editing]
   * @return ...
   */
  public function edit($id){
    $service = ServiceRequests::where('id',$id)->first();
    $vehicle_make = VehicleMakes::all();

    return view('edit',compact('service','vehicle_make'));
  }
  public function create(){
    $vehicle_make = VehicleMakes::all();
    return view('create',compact('vehicle_make'));
  }

  public function get_vehicle(Request $request){
    $id = $request->id;
    if($id){
      $vehicle_model = VehicleModels::where('vehicle_make_id',$id)->get();
      echo json_encode($vehicle_model); die();
    }
  }
  public function store(Request $request){
    $validatedData = $request->validate([
        'vehicle_make' => 'required',
        'vehicle_model' => 'required',
        'client_name' => 'required',
        'client_phone' => 'required',
        'client_email' => 'required',
        'description' => 'required',
    ]);

    $service = new ServiceRequests;
    $service->client_name = $request->client_name;
    $service->client_phone = $request->client_phone;
    $service->client_email = $request->client_email;
    $service->vehicle_model_id = $request->vehicle_model;
    $service->status = 'new';
    $service->description = $request->description;
    $service->created_at = date('Y-m-d H:i:s');
    $service->updated_at = date('Y-m-d H:i:s');
    $service->save();
    return redirect()->route('home')->with('message', 'Request Added!...');
  }
  public function update(Request $request){
    $validatedData = $request->validate([
        'vehicle_make' => 'required',
        'vehicle_model' => 'required',
        'client_name' => 'required',
        'client_phone' => 'required',
        'client_email' => 'required',
        'description' => 'required',
    ]);

    $service = ServiceRequests::where('id',$request->service_id)->first();
    $service->client_name = $request->client_name;
    $service->client_phone = $request->client_phone;
    $service->client_email = $request->client_email;
    $service->vehicle_model_id = $request->vehicle_model;
    $service->status = 'new';
    $service->description = $request->description;
    $service->created_at = date('Y-m-d H:i:s');
    $service->updated_at = date('Y-m-d H:i:s');
    $service->save();
    return redirect()->route('home')->with('message', 'Request Added!...');
  }
  public function delete($id){
    ServiceRequests::where('id',$id)->delete();
    return redirect()->route('home');
  }
}
