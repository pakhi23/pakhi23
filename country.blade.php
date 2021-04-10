
@extends('admin.layouts.index')

@section('content')
<section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Country</h1>
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
              <div class="card-header">
                  <h3 class="card-title">Country<a href="{{url('addcountryy')}}" class="btn btn-primary" style="margin-left:1200px;">Add Country</a></h3>                
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                  <table id="example1" class="table table-bordered table-striped">
                    <thead>                   
                    <tr>
                      <th>Country Name</th>
                             <th>Action</th>                 
                    </tr>
                    </thead>
                    <tbody>
                      @foreach($country as $countries)
                    <tr>                      
                      <td>{{$countries->name}}</td>     
                      <td>
                        <div class="row">
                      <a href="{{url('editcountry/'.$countries->id)}}" class="btn btn-success mr-2"><i class="fas fa-edit"></i></a>
                      
                  <form method="post" action="{{url('deletecountry/'.$countries->id)}}">                    
                    @csrf
                  @method('DELETE')
                  <a Onclick="confirmDelete(this)" class="btn btn-primary"><i class="fas fa-trash"></i></a>
                        </form>
                  
                  </td>
                </tr>
                
                @endforeach
                    </tbody>
                  </table>
                </div>
                <!-- /.card-body -->
              </div>
              <!-- /.card -->
            </div>
        
      </div>
    </section>
<script>
    $(function () {
      $("#example1").DataTable({
        "responsive": true, "lengthChange": false, "autoWidth": false,
        "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
      }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
      $('#example2').DataTable({
        "paging": true,
        "lengthChange": false,
        "searching": true,
        "ordering": true,
        "info": true,
        "autoWidth": true,
        "responsive": true,
      });
    });
  </script>
   <script>
    function confirmDelete(element)
    {
      var form = $(element).parent()
      swal({
        title: "Are you sure?",
        text: "Your will not be able to recover this!",
        type: "warning",
        showCancelButton: true,
        confirmButtonClass: "btn-danger",
        confirmButtonText: "Yes, delete it!",
        closeOnConfirm: false
    }).then( (result) =>{
      if(result){
        form.submit();
      }
    })
    }
    </script>
@endsection