
@extends('admin.layouts.index')

@section('content')

<div class="container">
    <h1 class="well">subadmin Form</h1>
	<div class="col-lg-12 well">
	<div class="row">
				<form action="{{url('addsubadmin')}}" method="POST">
                    @csrf
					<div class="col-sm-12">
						<div class="row">
							<div class="col-sm-6 form-group">
								<label>Full Name</label>
								<input type="text" name="name" placeholder="Enter First Name Here.." class="form-control">
                                @error('name')
                                <div style="color:red;">{{ $message }}</div>
                            @enderror
                            </div>

                        <div class="col-sm-6 form-group">
						<label>Mobile number</label>
						<input type="number" name="mobile" placeholder="Enter Phone Number Here.." class="form-control">
                        @error('mobile')
                        <div style="color:red;">{{ $message }}</div>
                    @enderror
                    </div>
                    
                    <div class="col-sm-12 form-group">
                        <div class="form-group">
						<label>Email Address</label>
						<input type="text" name="email" placeholder="Enter Email Address Here.." class="form-control">
                        @error('email')
                        <div style="color:red;">{{ $message }}</div>
                    @enderror
                    </div>
                </div>
                    
						
                       
                        <div class="col-sm-12">
						<div class="row">                            
                        <div class="col-sm-4 form-group">
								<label for="country">Country</label>
							  <select name="country" class="form-control " id="country-dropdonw">
                             <option value="">Select Country</option>
                            @foreach ($countries as $country)
                            <option value="{{$country->id}}">
                            {{$country->name}}
                            </option>
                            @endforeach
                                 </select>
                                </div>
                                 @error('country')
                                 <div style="color:red;">{{ $message }}</div>
                             @enderror                                  
                                    
                        <div class="col-md-4">
                            <label for="state">State</label>
                            <select name="state" class="form-control state_select2" id="state-dropdown">
                             </select>                     
                          @error('state')
                                 <div style="color:red;">{{ $message }}</div>
                             @enderror
                              </div>

							<div class="col-md-4">
							<label for="city">City</label>
                                <select  name="city" class="form-control city_select2" id="city-dropdown">
                                 </select>                                 
                                 @error('city')
                                 <div style="color:red;">{{ $message }}</div>
                             @enderror
                            </div>   

							<div class="form-group col-sm-12">                                                        
                                    <label>Current address</label>
                                    <textarea  name="currentaddress" placeholder="Enter Address Here.." rows="2" class="form-control"></textarea>
                                    @error('currentaddress')
                                    <div style="color:red;">{{ $message }}</div>
                                @enderror
                                </div>
                                
                            <div class="form-group col-sm-12">    
                                <label>Add Allotted City</label>
                                <select class="form-control allotedcity_select2" name="cityallotted" placeholder="Enter Allotted City Here..">
                                    <option>Select</option>
                                    @foreach($cities as $city)
                                    <option value="{{$city->id}}">{{$city->name}}</option>
                                  @endforeach
                                </select>
                                      @error('cityallotted')
                                <div style="color:red;">{{ $message }}</div>                                                              
                                @enderror                                                                                                       
                            </div> 
                        
                            <button type="submit" class="btn btn-lg btn-info">Submit</button>
                            
                                                                         
                        </div> 
                        	
				                      				                 
						 </div>
                       
                      </div>                      
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

                        $('.state_select2').select2();
                        $('.city_select2').select2();                      
                        $('.allotedcity_select2').select2();

                    $('#country-dropdonw').on('change', function() {
                
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
                    </script>
                
@endsection
