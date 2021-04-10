<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\state;
use App\Models\cities;
use App\Models\countries;

class locationcontroller extends Controller
{
    
    public function tableCountry()
    {
        $country = countries::get();
        return view('country', compact('country'));       
    }
    public function tableCity()
    {
         $city = cities::get();
        return view('city', compact('city'));
    }
    public function tableState()
    {  
         $state = state::get();
        return view('state', compact('state'));
        
    }



    public function addcountry()
    {
        $country = countries::get();
        
        return view('addcountry', compact('country'));
    }
    public function editcountry($id)
    {
        $country = countries::where('id', $id)->first();
        return view('editcountries', compact('country'));
    }
    public function updatecountry(Request $request, $id)
    {     
      $country=$request->only( ['name']);
       
      countries::where('id', $id)->update($country);
            return redirect('tablecountry');
    }
    public function countryadd(Request $request)    
    {
        $country=$request->only( ['name']);
        $country = countries::create($country);
        return redirect('tablecountry');
    }

    public function distroycountry($id)
    {
        $country = countries::find($id);
        $country->delete();
        return redirect()->back();
    }



    public function addstate()
    {
        $state = state::get();
        
        return view('addstate', compact('state'));
    }
    public function editstate($id)
    {
        $state = state::where('id', $id)->first();
        return view('editstate', compact('state'));
    }
    public function updatestate(Request $request, $id)
    {     
      $state=$request->only( ['name','country_id']);
       
      state::where('id', $id)->update($state);
            return redirect('tablestate');
    }
    public function stateadd(Request $request)    
    {
        $state=$request->only( ['name','country_id']);
        $state = state::create($state);
        return redirect('tablestate');
    }
    public function distroystate($id)
    {
        $state = state::find($id);
        $state->delete();
        return redirect()->back();
    }

     
    public function addcities()

    {
        $city = state::get();
        return view('addcities', compact('city'));
    }
    public function editcity($id)
    {
        $city = cities::where('id', $id)->first();
        return view('editcities', compact('city'));
    }
    public function updatecity(Request $request, $id)
    {     
      $city=$request->only( ['name','state_id']);
       
      cities::where('id', $id)->update($city);
            return redirect('tablecity');
    }
    public function cityadd(Request $request)    
    {
        $city=$request->only( ['name','state_id']);
        $city = cities::create($city);
        return redirect('tablecity');
    }
    public function distroycity($id)
    {
        $city = cities::find($id);
        $city->delete();
        return redirect()->back();
    }


}