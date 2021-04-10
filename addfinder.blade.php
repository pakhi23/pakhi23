
@extends('admin.layouts.index')

@section('content')

<div class="container">
    <h1 class="well">Finder Form</h1>
	<div class="col-lg-12 well">
	<div class="row">
				<form action="{{url('addfinder')}}" method="POST">
                    @csrf
					<div class="col-sm-12">
						<div class="row">
							<div class="col-sm-12 form-group">
								<label>Full Name</label>
								<input type="text" name="name" placeholder="Enter First Name Here.." class="form-control">
                                @error('name')
                                <div style="color:red;">{{ $message }}</div>
                            @enderror
                            </div>
                        
                         <div class="col-sm-12 form-group">
						<label>Mobile number</label>
						<input type="number" name="number" placeholder="Enter Phone Number Here.." class="form-control">
                        @error('number')
                        <div style="color:red;">{{ $message }}</div>
                    @enderror
                    </div>

				
                    <div class="col-sm-12 form-group">
                        <label>Address</label>
                        <input type="text" name="address" placeholder="Enter address Here.." class="form-control">
                        @error('address')
                        <div style="color:red;">{{ $message }}</div>
                    @enderror
                    </div>
             
                        <div class="col-sm-12 form-group">
						<label>Email Address</label>
						<input type="text" name="email" placeholder="Enter Email Address Here.." class="form-control">
                        @error('email')
                        <div style="color:red;">{{ $message }}</div>
                    @enderror
                    </div>
                
                  
							<div class="col-sm-12 form-group">
                            <label for="exampleFormControlSelect1">Blood Group</label>
                            <select class="form-control" name="bloodgroup" id="Blood Group">
                         <option value="">Select Blood Group</option>
                            <option>A Positive</option>
                            <option>A Negative</option>
                            <option>A Unknown</option>
                            <option>B Positive</option>
                            <option>B Negative</option>
                            <option>B Unknown</option>
                            <option>AB Positive</option>
                            <option>AB Negative</option>
                            <option>AB Unknown</option>
                            <option>O Positive</option>
                            <option>O Negative</option>
                            <option>O Unknown</option>
                            <option>Unknown</option>
                         
                            </select>
                            @error('bloodgroup')
                            <div style="color:red;">{{ $message }}</div>
                        @enderror
                        </div>
                    </div>
                </div>
                                     
                    </div>

                  
                        <div class="col-sm-12">
						<div class="row">

                        <div class="col-sm-4 form-group">
								<label for="country">Country</label>
							  <select name="country" class="form-control" id="country-dropdonw">
                             <option value="">Select Country</option>
                            @foreach ($countries as $country)
                            <option value="{{$country->id}}">
                            {{$country->name}}
                            </option>

                            @endforeach
                                 </select>
                                 @error('country')
                                 <div style="color:red;">{{ $message }}</div>
                             @enderror
                                    </div>
                            <div class="col-sm-4 form-group">
							<label for="state">State</label>
                                <select name="state" class="form-control state_select2" id="state-dropdown">
                                 </select>
                                 @error('state')
                                 <div style="color:red;">{{ $message }}</div>
                             @enderror
								</div>
							<div class="col-sm-4 form-group">
							<label for="city">City</label>
                                <select  name="city" class="form-control city_select2" id="city-dropdown">
                                 </select>
                                 @error('city')
                                 <div style="color:red;">{{ $message }}</div>
                             @enderror
                                 	</div>

						
                          </div>
						</div>


                        </div>

                     
					<button type="submit" class="btn btn-lg btn-info">Submit</button>
					</div>

				</form>
				</div>
                <br>
                    <br>
                    <br>
                </div>
                </div>
                
                <script src="{{asset('https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js')}}"></script>
                <script src="{{asset('https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js')}}"></script>
                <!-- jQuery -->
                <script src="{{asset('plugins/jquery/jquery.min.js')}}"></script>
                <script>
                    $(document).ready(function() {

                    $('#country-dropdonw').on('change', function() {
                        console.log('test');
                    var country_id = this.value;
                    $("#state-dropdown").html('');
                    $.ajax({
                    url:`get-states-by-country/${country_id}`,
                    type: "GET",
                    dataType : 'json',
                    success: function(result){

                    $('#state-dropdown').html('<option value="">Select State</option>');
                    $.each(result,function(key,value){
                    $("#state-dropdown").append('<option value="'+value.id+'">'+value.name+'</option>');
                    });
                    $('#city-dropdown').html('<option value="">Select State First</option>');
                    }
                    });
                    });
                    $('#state-dropdown').on('change', function() {
                    var state_id = this.value;
                    $("#city-dropdown").html('');
                    $.ajax({
                    url:`get-cities-by-state/${state_id}`,
                    type: "GET",
                    dataType : 'json',
                    success: function(result){
                    $('#city-dropdown').html('<option value="">Select City</option>');
                    $.each(result,function(key,value){
                    $("#city-dropdown").append('<option value="'+value.id+'">'+value.name+'</option>');
                    });
                    }
                    });
                    });
                    });
                    $(document).ready(function() {
            $('.state_select2').select2();
            $('.city_select2').select2();
        
            })   
      
                    </script>
                
@endsection
