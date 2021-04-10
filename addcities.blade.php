@extends('admin.layouts.index')
@section('content')
<div class="container">
        <h2>Add Cities</h2>
        
        <form  enctype="multipart/form-data"  action="{{url('cityadd')}}" method="POST">
            @csrf
            <div class="form-group">
                <label for="text">name:</label>
                <input type="text" class="form-control" id="name" placeholder="Enter name" name="name">
              
            </div>
            <div class="form-group">
                <label for="text">state id :</label>
                <input type="text" class="form-control" id="state_id" placeholder="Enter name" name="state_id">
              
            </div>
           
            <div class="checkbox">
                <label><input type="checkbox" name="remember"> Remember me</label>
            </div>
            <button type="submit" class="btn btn-default">Submit</button>
        </form>
    </div>

    @endsection