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
  

<div class="container">
	<h1 class="well">CMS Form</h1>
	<div class="col-lg-12 well">
		<div class="row">
			<form action="{{url('cmsaddd')}}" method="POST" enctype="multipart/form-data">
				@csrf
				<div class="row">
					<div class="col-sm-12 form-group">
						<label>Page Name</label>
						<input type="text" name="name" placeholder="Enter Name Here.." class="form-control">
					</div>
					<div class="col-sm-12 form-group">
						<label>Barner Image</label>
						<input type="file" name="image" placeholder="select image" class="form-control">
					</div>

                    <div class="card-body">
                        <textarea id="summernote" name="content">
                          Place <em>some</em> <u>text</u> <strong>here</strong>
                        </textarea>
                  
                    </div>
					<button type="submit" class="btn btn-lg btn-info">Submit</button>
			</form>
		</div>
	
	</div>
</div>
@push('script')
<script>
    $(function () {
      // Summernote
      $('#summernote').summernote()
  
      // CodeMirror
      CodeMirror.fromTextArea(document.getElementById("codeMirrorDemo"), {
        mode: "htmlmixed",
        theme: "monokai"
      });
    })
  </script>

@endpush
@endsection