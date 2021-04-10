@extends('admin.layouts.index')
@section('content')
<div class="container">
        <h2>edit state</h2>
        
        <form  enctype="multipart/form-data"  action="{{url('updatestatee/'.$state->id)}}" method="POST">
            @csrf
            <div class="row">
                <div class="col-sm-6 form-group">
                    <label> Name</label>
                    <input type="text" name="name"  value="{{$state->name}}" placeholder="Enter country Name Here.." class="form-control">
                </div>
                <div class="col-sm-6 form-group">
                    <label> country id</label>
                    <input type="text" name="country_id"  value="{{$state->country_id}}" placeholder="Enter country id  Here.." class="form-control">
                </div>


           
            <div class="checkbox">
                <label><input type="checkbox" name="remember"> Remember me</label>
            </div>
            <button type="submit" class="btn btn-default">Submit</button>
        </form>
    </div>

    @endsection