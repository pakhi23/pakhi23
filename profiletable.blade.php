@extends('admin.layouts.index')

@section('content')

    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Admin</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="">Home</a></li>
              <li class="breadcrumb-item active">DataTables</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>


<section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <!-- /.card -->

            <div class="card">
          
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th> name</th>
                    <th>email</th>
                    <th>password</th>
                    <th>image</th>
                    <th>action</th>
               
                  </tr>
                  </thead>
                  <tbody>
                    @foreach($adminn as $admin)
                
                  <tr>
                  
                    <td>{{$admin->name}}</td>
                    <td>{{$admin->email}}</td>
                    <td>{{$admin->password}}</td>
                    <td><img height='100px'src="{{$admin->image}}"/></td>
                   
                    <td>
                    <a href="{{ url('edit/'.$admin->id) }}" class="btn btn-success"><i class="fas fa-edit"></i></a>
                    </td>
                  
                  </tr>
                         
                </form>
                </div>
                  @endforeach
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>

        <!-- /.row -->
    
    </section>

@endsection