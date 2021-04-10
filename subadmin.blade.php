@extends('admin.layouts.index')

@section('content')
<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1>Subadmin</h1>
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
            <h3 class="card-title">Sub admin<a href="{{url('country-statee-city')}}" class="btn btn-primary"
                style="margin-left:1200px;">Add Subadmin</a></h3>
          </div>

          {{-- search filter --}}
          <form method="Get" action={{url('/subadmin')}}>
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Filter</h3>
                <div class="card-tools">
                  <!-- Collapse Button -->
                  <button type="button" class="btn btn-tool" data-card-widget="collapse"><i
                      class="fas fa-minus"></i></button>
                </div>
                <!-- /.card-tools -->
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <!-- /.form-group -->

                {{-- bloodgroup --}}
                <div class="col-sm-12">
                  <div class="row">
                    {{-- state --}}

                    <div class="form-group col-sm-4">
                      <label>State</label>
                      <select class="form-control state_select2 state" style="width: 100%;">
                        <option value="">Select</option>
                        @foreach ($states as $state)
                        <option {{ request()->get('state') == $state->id ?'selected':''}} value="{{$state->id}}">
                          {{$state->name}}
                        </option>
                        @endforeach
                      </select>
                    </div>
                    {{-- state --}}

                    {{-- city --}}
                    <div class="form-group col-sm-4">
                      <label>City</label>
                      <select class="form-control city_select2 city" style="width: 100%;">
                        <option value="">Select</option>

                      </select>
                    </div>
                    {{-- city --}}

                    <!-- /.form-group -->
                  </div>
                </div>
                <div>
                  <button type="submit" style="float:right;">Add Filter</button>
                  <button type="submit" class="btn btn-danger btn-sm mb-2 mr-2" style="float:right;">Remove
                    Filter</button>

                </div>
              </div>
              <!-- /.card-body -->
            </div>
          </form>
          <!-- /.search filtereS -->


          <!-- /.card-header -->
          <div class="card-body">
            <table id="example1" class="table table-bordered table-striped">
              <thead>

                <tr>
                  <th>Full name</th>
                  <th>Mobile number</th>
                  <th>Country</th>
                  <th>City</th>
                  <th>alloted City</th>
                  <th>Action</th>

                </tr>
              </thead>
              <tbody>
                @foreach($subadmin as $subadminn)
                <tr>

                  <td>{{$subadminn->name}}</td>
                  <td>{{$subadminn->number}}</td>
                  <td>{{$subadminn->countryname->name}}</td>
                  <td>{{$subadminn->cityname->name}}</td>
                  <td>{{$subadminn->allotedcity->name}}</td>
                  <td>
                    <div class="row">
                      <a href="{{url('editsubadmin/'.$subadminn->id)}}" class="btn btn-success  mr-2"><i class="fas fa-edit"></i></a>
                      <form method="post" action="{{url('ditroysubadmin/'.$subadminn->id)}}">
                        @csrf
                        @method('DELETE')
                        <a Onclick="confirmDelete(this)" class="btn btn-primary"><i class="fas fa-trash"></i></a>
                      </form>
                    </div>
                  </td>
                </tr>
          </div>
          </tr>

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
          "autoWidth": false,
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

<script>
  $(".state").on('change',function(){
      var state= $('.state').val();
    if (state !== ''){
      $.ajax({
               type:'GET',
               url:'/get-cities-by-state/'+state,
             
               success:function(data) {
                 var html = '';
              data.forEach(element => {
                html +='<option value="'+element.id+'">'+element.name+'</option>'
              });
              $('.city').html(html);
                 
               }
            });
            }
           
      
    });
    $(document).ready(function() {
    $('.state_select2').select2();
    $('.city_select2').select2();
    
    })


</script>



@endsection