
@extends('admin.layouts.index')

@section('content')



<div class="container">
    <h2>Edit profile</h2>

    <form  enctype="multipart/form-data" action="{{url('update/'.$adminn->id)}}" method="POST">
        @csrf
        <div class="form-group">
            <label for="text">name</label>
            <input type="text" class="form-control"  value="{{$adminn->name}}" id="name" placeholder="Enter name" name="name">

        </div>
        <div class="form-group">
            <label for="text">email</label>
            <input type="email" class="form-control" value="{{$adminn->email}}" id="email" placeholder="Enter email" name="email">
        </div>

        <div class="form-group">
            <label for="text">password</label>
            <input type="text" class="form-control" id="password" value="{{$adminn->password}}" placeholder="Enter email" name="password">
        </div>

        <div class="form-group">
            <label for="text">image</label>
            <input type="file" class="form-control" value="{{$adminn->image}}" id="image" placeholder="Enter password" name="image">
        </div>

        <button type="submit" class="btn btn-default">update</button>
    </form>
</div>



@endsection
