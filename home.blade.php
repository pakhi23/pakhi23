@extends('admin.layouts.index')
@section('content')


<!-- Content Header (Page header) -->
<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0">Admin Dashboard </h1>
      </div><!-- /.col -->
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="#">Home</a></li>
          <li class="breadcrumb-item active">Dashboard </li>
        </ol>
      </div><!-- /.col -->
    </div><!-- /.row -->
  </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->

<!-- Main content -->
<div class="content">
  <div class="container-fluid">

    <!-- Info boxes -->
    <div class="row">
      <div class="col-12 col-sm-6 col-md-3">
        <div class="info-box">
          <span class="info-box-icon bg-info elevation-1"><i class="fas fa-users"></i></span>


          <div class="info-box-content">
            <a href="{{url('doner')}}" class="nav-link">
              <span class="info-box-text">Doner</span>

              <span class="info-box-number">{{$count['donor_count']}}
              </span>
            </a>
          </div>
          <!-- /.info-box-content -->
        </div>
        <!-- /.info-box -->
      </div>
      <!-- /.col -->
      <div class="col-12 col-sm-6 col-md-3">
        <div class="info-box mb-3">
          <span class="info-box-icon bg-danger elevation-1"><i class="fas fa-user-shield"></i></i></span>

          <div class="info-box-content">
            <a href="{{url('finder')}}" class="nav-link">
              <span class="info-box-text">Finder</span>

              <span class="info-box-number">{{$count['finder_count']}}</span>
            </a>
          </div>
          <!-- /.info-box-content -->
        </div>
        <!-- /.info-box -->
      </div>
      <!-- /.col -->

      <!-- fix for small devices only -->
      <div class="clearfix hidden-md-up"></div>

      <div class="col-12 col-sm-6 col-md-3">
        @can('country-table')
        <div class="info-box mb-3">
          <span class="info-box-icon bg-success elevation-1"><i class="fas fa-map-marked-alt"></i></span>

          <div class="info-box-content">
            <a href="{{url('tablestate')}}" class="nav-link">
              <span class="info-box-text">State</span>
              <span class="info-box-number">{{$count['state_count']}}</span>

            </a>
          </div>

          <!-- /.info-box-content -->
        </div>
        @endcan
        <!-- /.info-box -->
      </div>

      <!-- /.col -->

      <div class="col-12 col-sm-6 col-md-3">
        @can('country-table')
        <div class="info-box mb-3">
          <span class="info-box-icon bg-warning elevation-1"><i class="fas fa-map-marked-alt"></i></span>

          <div class="info-box-content">
            <a href="{{url('tablecity')}}" class="nav-link">
              <span class="info-box-text">City</span>
              <span class="info-box-number">{{$count['city_count']}}</span>
            </a>
          </div>
          <!-- /.info-box-content -->
        </div>
        @endcan
        <!-- /.info-box -->
      </div>
      <!-- /.col -->
    </div>
    <!-- /.row -->
  </div>
  <!-- /.container-fluid -->
</div>
<!-- /.content -->


@endsection