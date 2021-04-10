@extends('admin.layouts.index')

@section('content')
 <!-- Content Header (Page header) -->
 <section class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1>Profile</h1>
            </div>
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active">User Profile</li>
              </ol>
            </div>
          </div>
        </div><!-- /.container-fluid -->
      </section>

      <!-- Main content -->
  <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-3">

            <!-- Profile Image -->
            <div class="card card-primary card-outline">
              <div class="card-body box-profile">
                <div class="text-center">
                  <img class="profile-user-img img-fluid img-circle"
                       src="{{auth()->user()->image}}"  alt="User profile picture">
                </div>

                <h3  class="profile-username text-center">{{auth()->user()->name}}</h3>

                <p class="text-muted text-center">Software Engineer</p>
            
<!--                  
                <a href="{{url('profiletablee')}}" class="btn btn-primary btn-block"><b>Edir Profile</b></a> -->
                
                 
                <a href="{{ url('edit/'.auth()->user()->id) }}" class="btn btn-primary btn-block"><b>Edir Profile</b></a>
             
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->


          </div>
          <!-- /.col -->
          <div class="col-md-9">

            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    @endsection

      <!-- /.content -->
