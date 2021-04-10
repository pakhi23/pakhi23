<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\state;
use App\Models\cities;
use App\Models\countries;
use App\Models\User;
use App\Models\ModelHasRole;
use Illuminate\Support\Facades\Hash;

use function PHPSTORM_META\type;

class SubAdminController extends Controller
{
    //
    public function getcontriess()
    {
        $countries = countries::all();
        $cities = cities::all();
        return view('addsubadmin', compact('countries', 'cities'));
    }

    public function getStates($id)
    {
        $states = state::whereCountryId($id)->get(["name", "id"]);
        return response()->json($states);
    }

    public function getCities($id)
    {
        $cities = cities::where("state_id", $id)->get(["name", "id"]);
        return response()->json($cities);
    }



    public function subadmintable(Request $request)
    {
        $subadmin = User::with(['countryname','cityname','allotedcity'])->whereHas("roles",function($q){
            $q->where('name',"Admin");
        })->when(isset($request->city), function ($q) use ($request) {
            $q->where('city', $request->city);
        })->when(isset($request->state), function ($q) use ($request) {
            $q->where('state', $request->state);
        })->get();

        $states = state::all();
        $cities = cities::all();

        return view('subadmin', compact('subadmin', 'states', 'cities'));
    }

    public function subadminadd(Request $request)
    {
        // dd($request->all());
        $validated = $request->validate([
            'name' => 'required|max:20',
            'mobile' => 'required|max:10',
            'email' => 'required|email',
            'currentaddress' => 'required',
            'cityallotted' => 'required',
            'country' => 'required',
            'state' => 'required',
            'city' => 'required',
        ]);

 
               $subadmin = $request->only(['name', 'mobile', 'email', 'currentaddress', 'country', 'state', 'city', 'cityallotted']);
        $subadmin['password']= Hash::make('123456789');
        $subadmin = User::create($subadmin);

        $subadmin = ModelHasRole::create(['role_id' => 2, 'model_id' => $subadmin->id, 'model_type' => 'App\Models\User']);



        return redirect('subadmin');
    }

    public function editsubadmin($id)
    {
        $countries = countries::all();
        $states = state::all();
        $cities = cities::all();
        $subadmin = User::where('id', $id)->first();
     
        return view('editsubadmin', compact('subadmin', 'countries', 'states', 'cities'));
    }

    public function updatesubadmin(Request $request, $id)
    {
        
        $validated = $request->validate([
            'name' => 'required|max:20',
            'mobile' => 'required|max:10',
            'email' => 'required|email',
            'currentaddress' => 'required',
            'cityallotted' => 'required',
            'country' => 'required',
            'state' => 'required',
            'city' => 'required',
        ]);
        // dd($request->all()); 
  $subadmin = $request->only(['name', 'mobile', 'email', 'currentaddress', 'country', 'state', 'city', 'cityallotted']);
       
        user::where('id', $id)->update($subadmin);
        return redirect('subadmin');
    }
    public function distroysubadminn($id)
    {
        $subadmin = User::find($id);
        $subadmin->delete();
        return redirect()->back();
    }
}
