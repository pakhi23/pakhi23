@extends('admin.layouts.index')
@section('content')
<div class="container">
        <h2>edit Countries</h2>
        
        <form  enctype="multipart/form-data"  action="{{url('updatecountry/'.$country->id)}}" method="POST">
            @csrf
            <div class="form-group">
                <label for="text">name:</label>
                <input type="text" class="form-control"  value="{{$country->name}}" id="name" placeholder="Enter name" name="name">
              
            </div>
            
           
            <div class="checkbox">
                <label><input type="checkbox" name="remember"> Remember me</label>
            </div>
            <button type="submit" class="btn btn-default">Submit</button>
        </form>
    </div>

    @endsection