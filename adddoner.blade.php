
@extends('admin.layouts.index')

@section('content')

<div class="container">
    <h1 class="well">Donor Form</h1>
	<div class="col-lg-12 well">
	<div class="row">
				<form action="{{url('adddoner')}}" method="POST">
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
						<input type="number" name="number" placeholder="Enter Phone Number Here.." class="form-control">
                        @error('number')
                        <div style="color:red;">{{ $message }}</div>
                    @enderror
                    </div>
                    <div class="col-sm-12">
						<div class="row">
                        <div class="col-sm-4 form-group">
							<label for="birthDate" class="col-sm-6 control-label">Date of Birth*</label>
                            <input type="date" name="birthDate" id="birthDate" class="form-control">
                            @error('birthDate')
                            <div style="color:red;">{{ $message }}</div>
                        @enderror
                        </div>

							<div class="col-sm-4 form-group">
                            <label for="weight" class="col-sm-3 control-label">Weight* </label>
                            <input type="number" name="weight" id="weight" placeholder="Please write your weight in kilograms" class="form-control">
                            @error('weight')
                            <div style="color:red;">{{ $message }}</div>
                        @enderror
                        </div>


                            <div class="col-sm-4 form-group">
						<label>Age</label>
						<input type="number" name="age" placeholder="Enter Your Age.." class="form-control">
					    
                    </div>
                    @error('age')
                            <div style="color:red;">{{ $message }}</div>
                        @enderror
						</div>
                        <div class="form-group">
						<label>Email Address</label>
						<input type="text" name="email" placeholder="Enter Email Address Here.." class="form-control">
                        @error('email')
                        <div style="color:red;">{{ $message }}</div>
                    @enderror
                    </div>

                    <div class="col-sm-12">
						<div class="row">
							<div class="col-sm-6 form-group">
                            <label for="exampleFormControlSelect1">Blood Group</label>
                            <select class="form-control bloodgroup_select2" name="bloodgroup" id="Blood Group">
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

                            <div class="col-sm-6 form-group">
                            <label for="#">Gender</label>
                                <select class="form-control" name="gender" id="#">
                                <option value="Male">Male</option>
                                <option value="Female">Female</option>
                                </select>
                                @error('gender')
                                <div style="color:red;">{{ $message }}</div>
                            @enderror
                            </div>



                        </div>

                    </div>

                    <div class="row">
							<div class="col-sm-6 form-group">
                            <label>Current address</label>
							<textarea  name="currentaddress" placeholder="Enter Address Here.." rows="2" class="form-control"></textarea>
                            @error('currentaddress')
                            <div style="color:red;">{{ $message }}</div>
                        @enderror
                        </div>

                        <div class="col-sm-6 form-group">
                            <label>Permanent address</label>
							<textarea name="permanentaddress" placeholder="Enter Address Here.." rows="2" class="form-control"></textarea>
                            @error('permanentaddress')
                            <div style="color:red;">{{ $message }}</div>
                        @enderror
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

                        <div class="form-group">
                            <label for="#">Covid-19 recovered warrior</label>
                            <select name="covid" class="form-control" id="#">
                             <option value="">Select </option>                         
                            <option>Yes</option>
                            <option>No</option>
                         
                            </select>
                            @error('covid')
                            <div style="color:red;">{{ $message }}</div>
                        @enderror
                        </div>


                        <div class="form-group">
                            <label for="#">Willing to donate Plasma</label>
                            <select name="willingtodonateplasma" class="form-control" id="#">
                                <option value="">Select </option>                         
                            <option>Yes</option>
                            <option>No</option>
                         
                            </select>
                            @error('willingtodonateplasma')
                            <div style="color:red;">{{ $message }}</div>
                        @enderror
                        </div>


                        <div class="form-group">
                            <label for="#">Which type of Blood donor are you</label>
                            <select  name="whichtypedoner" class="form-control" id="#">
                                <option value="">Select </option>                         
                            <option>Frequent donor</option>
                            <option>As per the Need</option>
                            <option>Never Done before </option>
                          
                            </select>
                            @error('whichtypedoner')
                            <div style="color:red;">{{ $message }}</div>
                        @enderror
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

                        $('.state_select2').select2();
                        $('.city_select2').select2();
                        $('.bloodgroup_select2').select2();

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
                    </script>
                
@endsection
