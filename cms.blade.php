
@extends('layouts.app')
@section('content')
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header mt-4">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>DataTables</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">DataTables</li>
          </ol>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
  
            <div class="card">
              <div class="card-header">
                <a href="{{('cms')}}" class="btn btn-primary" >Add Cms</a>       
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                    <tr>
                      <th>Page Name</th>
                      <th>Baner Image</th>
                      <th>Content</th>
                      <th>Sorting Number</th>
                      <th>Status</th>                     
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($input as $inputt)                
                    <tr>
                      <td>{{$inputt->name}}</td>
                      <td><img height='150px' width='400px' src="{{$inputt->image}}"></img></td>
                      <td>{!!$inputt->content!!}</td>
                      <td>{{$inputt->snumber}}</td>
                      <td><span class="badge badge-success">{{$inputt->status}}</span></td>
                     <td>
                      <div class="row">
                        <a href="{{url('admin/editcmss/'.$inputt->id)}}" class="btn btn-success  mr-2"><i class="fas fa-edit"></i></a>
                        <form method="post" action="{{url('admin/deletecmss/'.$inputt->id)}}">                          
                          @csrf
                          @method('DELETE')
                          <a Onclick="confirmDelete(this)" class="btn btn-primary"><i class="fas fa-trash"></i></a>
                        </form>
                      </div>
                        </form>
                    </td>
                  </tr>
                  @endforeach
                  </tbody>
                </table>
              </div>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
 
    </section>

    <!-- /.content -->
</div>



@push('script')
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
@endpush
@endsection