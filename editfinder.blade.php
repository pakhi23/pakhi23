
@extends('admin.layouts.index')

@section('content')
<div class="container">
    <h1 class="well">Edit finder </h1>
	<div class="col-lg-12 well">
	<div class="row">
				<form action="{{url('updatefinder/'.$finder->id)}}" method="POST">
                    @csrf
                   
					<div class="col-sm-12">
						<div class="row">
							<div class="col-sm-12 form-group">
								<label>Full Name</label>
								<input type="text" name="name" value="{{ $finder->name }}" placeholder="Enter First Name Here.." class="form-control">
                                @error('name')
                                <div style="color:red;">{{ $message }}</div>
                            @enderror
                            </div>

                            <div class="col-sm-12 form-group">
						<label>Mobile number</label>
						<input type="number" value="{{ $finder->number }}" name="number"placeholder="Enter Phone Number Here.." class="form-control">
                        @error('number')
                        <div style="color:red;">{{ $message }}</div>
                    @enderror
                    </div>
                 
                        <div class="col-sm-12 form-group">
						<label>Email Address</label>
						<input type="text" name="email"  value="{{ $finder->email }}"   placeholder="Enter Email Address Here.." class="form-control">
                        @error('email')
                        <div style="color:red;">{{ $message }}</div>
                    @enderror
                    </div>

                    <div class="col-sm-12 form-group">
						<label> Address</label>
						<input type="text" name="address"  value="{{ $finder->address }}"   placeholder="Enter  Address Here.." class="form-control">
                        @error('address')
                        <div style="color:red;">{{ $message }}</div>
                    @enderror
                    </div>

                    <div class="col-sm-12 form-group">
							<div class="col-sm-12 form-group">
                            <label for="exampleFormControlSelect1">Blood Group</label>
                            <select class="form-control" name="bloodgroup" id="Blood Group">
                            <option>Select</option>                                 
                            <option  @if($finder->bloodgroup == 'A Positive') selected @endif  >A Positive</option>
                            <option  @if($finder->bloodgroup == 'A Negative') selected @endif>A Negative</option>
                            <option  @if($finder->bloodgroup == 'A Unknown') selected @endif>A Unknown</option>
                            <option  @if($finder->bloodgroup == 'B Positive') selected @endif>B Positive</option>
                            <option  @if($finder->bloodgroup == 'B Negative') selected @endif>B Negative</option>
                            <option  @if($finder->bloodgroup == 'B Unknown') selected @endif>B Unknown</option>
                            <option  @if($finder->bloodgroup == 'AB Positive') selected @endif>AB Positive</option>
                            <option  @if($finder->bloodgroup == 'AB Negative') selected @endif>AB Negative</option>
                            <option  @if($finder->bloodgroup == 'AB Unknown') selected @endif>AB Unknown</option>
                            <option  @if($finder->bloodgroup == 'O Positive') selected @endif>O Positive</option>
                            <option  @if($finder->bloodgroup == 'O Negative') selected @endif>O Negative</option>
                            <option  @if($finder->bloodgroup == 'O Unknown') selected @endif>O Unknown</option>
                            <option  @if($finder->bloodgroup == 'Unknown') selected @endif>Unknown</option>

                            </select>
                            @error('bloodgroup')
                            <div style="color:red;">{{ $message }}</div>
                        @enderror
                        </div>                           
                        </div>
                    </div>                

                        
                        <div class="col-sm-12">
						<div class="row">

                        <div class="col-sm-2 form-group">
								<label for="country">Country</label>
                                <select name="country" class="form-control" id="country-dropdonw">
                                    <option value="">Select Country</option>
                                    
                                @foreach ($countries as $country)
                                   @if($finder->country == $country->id)
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
                                <select name="state" class="form-control state" id="">
                                    @foreach ($states as $state)
                                    @if($finder->state == $state->id)
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
                                <select  name="city" class="form-control city" id="city-dropdown">
                                    @foreach ($cities as $city)
                                    @if($finder->city == $city->id)
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
                   </script>

                   
               
              
@endsection
