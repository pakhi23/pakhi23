
@extends('admin.layouts.index')

@section('content')

<div class="container">
    <h1 class="well">Edit Donor </h1>
	<div class="col-lg-12 well">
	<div class="row">
				<form action="{{url('updatedoner/'.$donor->id)}}" method="POST">
                    @csrf
                   
					<div class="col-sm-12">
						<div class="row">
							<div class="col-sm-6 form-group">
								<label>Full Name</label>
								<input type="text" name="name" value="{{ $donor->name }}" placeholder="Enter First Name Here.." class="form-control">
                                @error('name')
                                <div style="color:red;">{{ $message }}</div>
                            @enderror
                            </div>

                            <div class="col-sm-6 form-group">
						<label>Mobile number</label>
						<input type="number" value="{{ $donor->number }}" name="number"placeholder="Enter Phone Number Here.." class="form-control">
                        @error('number')
                        <div style="color:red;">{{ $message }}</div>
                    @enderror
                    </div>
                    <div class="col-sm-12">
						<div class="row">
                        <div class="col-sm-4 form-group">
							<label for="birthDate" class="col-sm-6 control-label">Date of Birth*</label>
                            <input type="date"  value="{{ $donor->birthDate }}" name="birthDate" id="birthDate" class="form-control">	</div>
                            @error('birthDate')
                            <div style="color:red;">{{ $message }}</div>
                        @enderror
							<div class="col-sm-4 form-group">
                            <label for="weight" class="col-sm-3 control-label">Weight* </label>
                            <input type="number"  value="{{ $donor->weight }}"  name="weight" id="weight" placeholder="Please write your weight in kilograms" class="form-control">
                            @error('weight')
                            <div style="color:red;">{{ $message }}</div>
                        @enderror
                        </div>


                            <div class="col-sm-4 form-group">
						<label>Age</label>
						<input type="number"  value="{{ $donor->age }}"  name="age" placeholder="Enter Your Age.." class="form-control">
                        @error('age')
                        <div style="color:red;">{{ $message }}</div>
                    @enderror

                    </div>

						</div>
                        <div class="form-group">
						<label>Email Address</label>
						<input type="text" name="email"  value="{{ $donor->email }}"   placeholder="Enter Email Address Here.." class="form-control">
                        @error('email')
                        <div style="color:red;">{{ $message }}</div>
                    @enderror
                    </div>

                    <div class="col-sm-12">
						<div class="row">
							<div class="col-sm-6 form-group">
                            <label for="exampleFormControlSelect1">Blood Group</label>
                            <select class="form-control" name="bloodgroup" id="Blood Group">
                            <option>Select</option>                                 
                            <option  @if($donor->bloodgroup == 'A Positive') selected @endif  >A Positive</option>
                            <option  @if($donor->bloodgroup == 'A Negative') selected @endif>A Negative</option>
                            <option  @if($donor->bloodgroup == 'A Unknown') selected @endif>A Unknown</option>
                            <option  @if($donor->bloodgroup == 'B Positive') selected @endif>B Positive</option>
                            <option  @if($donor->bloodgroup == 'B Negative') selected @endif>B Negative</option>
                            <option  @if($donor->bloodgroup == 'B Unknown') selected @endif>B Unknown</option>
                            <option  @if($donor->bloodgroup == 'AB Positive') selected @endif>AB Positive</option>
                            <option  @if($donor->bloodgroup == 'AB Negative') selected @endif>AB Negative</option>
                            <option  @if($donor->bloodgroup == 'AB Unknown') selected @endif>AB Unknown</option>
                            <option  @if($donor->bloodgroup == 'O Positive') selected @endif>O Positive</option>
                            <option  @if($donor->bloodgroup == 'O Negative') selected @endif>O Negative</option>
                            <option  @if($donor->bloodgroup == 'O Unknown') selected @endif>O Unknown</option>
                            <option  @if($donor->bloodgroup == 'Unknown') selected @endif>Unknown</option>

                            </select>
                            @error('bloodgroup')
                            <div style="color:red;">{{ $message }}</div>
                        @enderror
                        </div>

                            <div class="col-sm-6 form-group">
                            <label>Gender</label>
                                <select class="form-control" name="gender">
                                    <option>Select</option>
                                    <option  @if($donor->gender == 'Male') selected @endif>Male</option>
                                <option @if($donor->gender == 'Female') selected @endif>Female</option>
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
							<textarea  name="currentaddress" placeholder="Enter Address Here.." rows="2" class="form-control">{{ $donor->currentaddress }}</textarea>
                            @error('currentaddress')
                            <div style="color:red;">{{ $message }}</div>
                        @enderror
                        </div>

                        <div class="col-sm-6 form-group">
                            <label>Permanent address</label>
							<textarea name="permanentaddress" placeholder="Enter Address Here.." rows="2" class="form-control">{{ $donor->permanentaddress }}</textarea>
                            @error('permanentaddress')
                            <div style="color:red;">{{ $message }}</div>
                        @enderror
                        </div>

                        
                        <div class="col-sm-12">
						<div class="row">

                        <div class="col-sm-2 form-group">
								<label for="country">Country</label>
                                <select name="country" class="form-control" id="country-dropdonw">
                                    <option value="">Select Country</option>
                                    
                                @foreach ($countries as $country)
                                   @if($donor->country == $country->id)
                                        <option value="{{$country->id}}" selected>
                                            {{$country->name}}
                                        </option>
                                   @else 
                                        <option value="{{$country->id}}">
                                            {{$country->name}}
                                        </option> 
                                   @endif
                                @endforeach
                                </select>
                                @error('country')
                                <div style="color:red;">{{ $message }}</div>
                            @enderror
                        </div>
                    
                        <div class="col-md-6 form-group">
                           
							<label>State</label>
                                <select name="state" class="form-control state_select2 state" id="">
                                    <option value="">Select</option>
                  
                                    @foreach ($states as $state)
                                    @if($donor->state == $state->id)
                                         <option value="{{$state->id}}" selected>
                                             {{$state->name}}
                                         </option>
                                    @else 
                                         <option value="{{$state->id}}">
                                             {{$state->name}}
                                         </option> 
                                    @endif
                                 @endforeach
                                 </select>
                                 @error('state')
                                 <div style="color:red;">{{ $message }}</div>
                             @enderror
						</div>
             				<div class="col-sm-4 form-group">
							<label for="city">City</label>
                                <select  name="city" class="form-control city city_select2" id="city-dropdown">
                                    @foreach ($cities as $city)
                                    @if($donor->city == $city->id)
                                         <option value="{{$city->id}}" selected>
                                             {{$city->name}}
                                         </option>
                                    @else 
                                         <option value="{{$city->id}}">
                                             {{$city->name}}
                                         </option> 
                                    @endif
                                 @endforeach
                                 </select>
                                 @error('city')
                                 <div style="color:red;">{{ $message }}</div>
                             @enderror
                                 	</div>

						
                          </div>
						</div>


                        </div>

                        <div class="form-group">
                           
                            <label>Covid-19 recovered warrior</label>
                            <select name="covid" class="form-control">
                                <option >select</option>                             
                                <option @if($donor->covid == 'Yes') selected @endif value="Yes">Yes</option>
                                 <option  @if($donor->covid == 'No') selected @endif>No</option>
                            </select>
                            @error('covid')
                            <div style="color:red;">{{ $message }}</div>
                        @enderror
                        </div>


                        <div class="form-group">
                            <label>Willing to donate Plasma</label>
                            <select name="willingtodonateplasma" class="form-control">
                                <option>select</option>                             
                                <option  @if($donor->willingtodonateplasma == 'Yes') selected @endif>Yes</option>
                            <option  @if($donor->willingtodonateplasma == 'No') selected @endif>No</option>
                            </select>
                            @error('willingtodonateplasma')
                            <div style="color:red;">{{ $message }}</div>
                        @enderror
                        </div>


                        <div class="form-group">
                            <label>Which type of Blood donor are you</label>
                            <select  name="whichtypedoner"  class="form-control">
                                <option>select</option>
                                <option  @if($donor->whichtypedoner == 'Frequent donor')selected @endif>Frequent donor</option>
                            <option   @if($donor->whichtypedoner == 'As per the Need')selected @endif>As per the Need</option>
                            <option   @if($donor->whichtypedoner == 'Never Done before ')selected @endif>Never Done before </option>
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
