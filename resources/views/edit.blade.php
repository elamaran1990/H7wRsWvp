@extends('layouts.main')
@section('content')
  <!-- Masthead -->
  <header class="masthead text-white text-center">
    <div class="overlay"></div>
    <div class="container">
      <div class="row">
        <div class="col-xl-9 mx-auto">
          <h1 class="mb-5">Let's get your vehicle back on the trail!</h1>
        </div>
      </div>
    </div>
  </header>

  <h1>Create Ticket</h1>

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<div class="container">
  <form id="create_ticket" action="{{route('update')}}" method="POST">
    {{csrf_field()}}

    <input type="hidden" name="service_id" value="{{$service->id}}">

    <label for="vehicle_make">Vehicle Make</label>
    <select id="vehicle_make" name="vehicle_make">
      <option value="">Select Vehicle make</option>
      @if($vehicle_make)
      @foreach($vehicle_make as $v)
      <option value="{{$v->id}}" @if($service->vehicle_model->vehicle_make->id == $v->id){{'selected'}} @endif>{{$v->title}}</option>
      @endforeach
      @endif
      
    </select>
    @if ($errors->has('vehicle_make'))
    <div class="alert alert-danger">
      <span class="help-block">
        <strong>{{ $errors->first('vehicle_make') }}</strong>
      </span>
    </div>
    @endif

    <label for="vehicle_model">Vehicle Model</label>
    <select id="vehicle_model" name="vehicle_model">
      <option value="{{$service->vehicle_model->id}}">{{$service->vehicle_model->title}}</option>
      
    </select>
    
    @if ($errors->has('vehicle_model'))
    <div class="alert alert-danger">
      <span class="help-block">
        <strong>{{ $errors->first('vehicle_model') }}</strong>
      </span>
      </div>
    @endif
  

    

    <label for="client_name">Client Name</label>
    <input type="text" id="client_name" name="client_name" value="{{$service->client_name}}">
    @if ($errors->has('client_name'))
    <div class="alert alert-danger">
      <span class="help-block">
        <strong>{{ $errors->first('client_name') }}</strong>
      </span>
    </div>
    @endif

    <label for="client_phone">Client Phone</label>
    <input type="text" id="client_phone" name="client_phone" value="{{$service->client_phone}}">
    @if ($errors->has('client_phone'))
    <div class="alert alert-danger">
      <span class="help-block">
        <strong>{{ $errors->first('client_phone') }}</strong>
      </span>
    </div>
    @endif

    <label for="client_email">Client Email</label>
    <input type="text" id="client_email" name="client_email" value="{{$service->client_email}}">
    @if ($errors->has('client_email'))
    <div class="alert alert-danger">
      <span class="help-block">
        <strong>{{ $errors->first('client_email') }}</strong>
      </span>
    </div>
    @endif

    <label for="description">Service Description</label>
    <textarea id="description" name="description" placeholder="Write something.." style="height:200px">{{$service->description}}</textarea>
    @if ($errors->has('description'))
    <div class="alert alert-danger">
      <span class="help-block">
        <strong>{{ $errors->first('description') }}</strong>
      </span>
    </div>
    @endif

    <input type="submit" value="Submit">

  </form>
</div>

  @endsection
  