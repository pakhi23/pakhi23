
@extends('admin.layouts.index')

@section('content')

<div class="container">
    <h1 class="well">state Form</h1>
	<div class="col-lg-12 well">
	<div class="row">
				<form action="{{url('stateadd')}}" method="POST">
                    @csrf
					
						<div class="row">
							<div class="col-sm-6 form-group">
								<label> Name</label>
								<input type="text" name="name" placeholder="Enter country Name Here.." class="form-control">
							</div>
                            <div class="col-sm-6 form-group">
								<label> country id</label>
								<input type="text" name="country_id" placeholder="Enter country id  Here.." class="form-control">
							</div>

					<button type="submit" class="btn btn-lg btn-info">Submit</button>
					

				</form>
				</div>
                <br>
                    <br>
                    <br>
                </div>
                </div>
              
                
@endsection
