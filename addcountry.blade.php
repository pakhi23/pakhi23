
@extends('admin.layouts.index')

@section('content')

<div class="container">
    <h1 class="well">Donor Form</h1>
	<div class="col-lg-12 well">
	<div class="row">
				<form action="{{url('countryaddd')}}" method="POST">
                    @csrf
					
						<div class="row">
							<div class="form-group">
								<label> Name</label>
								<input type="text" name="name" placeholder="Enter country Name Here.." class="form-control">
							</div>
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
