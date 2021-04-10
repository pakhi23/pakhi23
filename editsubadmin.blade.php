@extends('admin.layouts.index')

@section('content')

<div class="container">
    <h1 class="well">Edit subadmin </h1>
    <div class="col-lg-12 well">
        <div class="row">
            <form action="{{url('updatesubadmin/'.$subadmin->id)}}" method="POST">
                @csrf

                <div class="col-sm-12">
                    <div class="row">
                        <div class="col-sm-6 form-group">
                            <label>Full Name</label>
                            <input type="text" name="name" value="{{ $subadmin->name }}"
                                placeholder="Enter First Name Here.." class="form-control">
                            @error('name')
                            <div style="color:red;">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-sm-6 form-group">
                            <label>Mobile number</label>
                            <input type="number" value="{{ $subadmin->number }}" name="mobile"
                                placeholder="Enter Phone Number Here.." class="form-control">
                            @error('mobile')
                            <div style="color:red;">{{ $message}}</div>
                            @enderror
                        </div>

                        <div class="col-sm-12 form-group">
                            <label>Email Address</label>
                            <input type="text" name="email" value="{{ $subadmin->email }}"
                                placeholder="Enter Email Address Here.." class="form-control">
                            @error('email')
                            <div style="color:red;">{{ $message }}</div>
                            @enderror
                        </div>


                        <div class="col-sm-12 form-group">
                            <label>Current address</label>
                            <textarea name="currentaddress" placeholder="Enter Address Here.." rows="2"
                                class="form-control">{{ $subadmin->currentaddress }}</textarea>
                            @error('currentaddress')
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
                                        @if($subadmin->country == $country->id)
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

                                <div class="col-md-4 form-group">

                                    <label>State</label>
                                    <select name="state" class="form-control state_select2 state" id="">
                                        <option value="">Select</option>

                                        @foreach ($states as $state)
                                        @if($subadmin->state == $state->id)
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
                                    <select name="city" class="form-control city_select2 city" id="city-dropdown">
                                        @foreach ($cities as $city)
                                        @if($subadmin->city == $city->id)
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

                                <div class="form-group">
                                    <label>Edit Allotted City</label>
                                    <br>
                                    <select class="form-control allotadcity_select2" name="cityallotted"
                                        placeholder="Enter Allotted City Here..">
                                        <option>Select</option>

                                        @foreach($cities as $city)
                                        @if($subadmin->cityallotted == $city->id)
                                        <option value="{{$city->id}}" selected>
                                            {{$city->name}}
                                        </option>
                                        @else
                                        <option value="{{$city->id}}">
                                            {{$city->name}}
                                        </option>
                                        @endif
                                        @endforeach

                                    </select> @error('cityallotted')
                                    <div style="color:red;">{{ $message }}</div>
                                    @enderror
                                </div>


                            </div>
                            <div>
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
            $('.state_select2 ').select2();
            $('.city_select2').select2();
            $('.allotadcity_select2').select2();
        
            })   
</script>

@endsection