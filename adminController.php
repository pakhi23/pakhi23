<?php

namespace App\Http\Controllers;

use App\Models\admin;
use App\Models\state;
use App\Models\cities;
use App\Models\countries;
use App\Models\donor;
use App\Models\finder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\File;


class adminController extends Controller
{


    public function profiletable()
    {
        $adminn = admin::get();
        return view('profiletable', compact('adminn'));
    }

    public function donertable(Request $request)
        {
        $donor = donor::when(isset($request->city), function ($q) use ($request) {
            $q->where('city', $request->city);
        })
            ->when(isset($request->state), function ($q) use ($request) {
                $q->where('state', $request->state);
            })
            ->when(isset($request->bloodgroup), function ($q) use ($request) {
                $q->where('bloodgroup', $request->bloodgroup);
            })->when(auth()->user()->id != 1,function($q){
                $q->whereCreatedBy(auth()->user()->id);
            })->get();
          

        $states = state::all();
        $cities = cities::all();

        return view('doner', compact('donor', 'states', 'cities'));
    }

    public function donoradd(Request $request)
    {
       
        $validated = $request->validate([
            'name' => 'required|max:20',
            'number' => 'required|max:10',
            'birthDate' => 'required|date_format:Y-m-d|before:today',
            'weight' => 'required|max:3',
            'age' => 'required|max:2',
            'email' => 'required|email',
            'bloodgroup' => 'required',
            'gender' => 'required',
            'currentaddress' => 'required',
            'permanentaddress' => 'required',
            'country' => 'required',
            'state' => 'required',
            'city' => 'required',
            'covid' => 'required',
            'willingtodonateplasma' => 'required',
            'whichtypedoner' => 'required',

        ]);
      
        $donor = $request->only(['name', 'number', 'birthDate', 'weight', 'age', 'email', 'bloodgroup', 'gender', 'currentaddress', 'permanentaddress', 'country', 'state', 'city', 'district', 'covid', 'willingtodonateplasma', 'whichtypedoner']);
        $donor['created_by']= auth()->id();
        $donor = donor::create($donor);
      
        return redirect('doner');
    }

    public function editdonorr($id)
    {
        $countries = countries::all();
        $states = state::all();
        $cities = cities::all();

        $donor = donor::where('id', $id)->first();
        return view('editdoner', compact('donor', 'countries', 'states', 'cities'));
    }

    public function updatedoner(Request $request, $id)
    {
        $validated = $request->validate([
            'name' => 'required|max:20',
            'number' => 'required|max:10',
            'birthDate' => 'required|date_format:Y-m-d|before:today',
            'weight' => 'required|max:3',
            'age' => 'required|max:2',
            'email' => 'required|email',
            'bloodgroup' => 'required',
            'gender' => 'required',
            'currentaddress' => 'required',
            'permanentaddress' => 'required',
            'country' => 'required',
            'state' => 'required',
            'city' => 'required',
            'covid' => 'required',
            'willingtodonateplasma' => 'required',
            'whichtypedoner' => 'required',

        ]);

        $donor = $request->only(['name', 'number', 'birthDate', 'weight', 'age', 'email', 'bloodgroup', 'gender', 'currentaddress', 'permanentaddress', 'country', 'state', 'city', 'covid', 'willingtodonateplasma', 'whichtypedoner']);
        donor::where('id', $id)->update($donor);
        return redirect('doner');
    }
    public function distroydonor($id)
    {
        $donor = donor::find($id);
        $donor->delete();
        return redirect()->back();
    }


    public function editprofile($id)
    {
        $adminn = admin::where('id', $id)->first();
        return view('editprofile', compact('adminn'));
    }



    public function updateprofile(Request $request, $id)
    {
        $updateprofile = admin::where('id', $id)->first();
        if ($request->image) {
            $updateAgentImage = basename($updateprofile->image);
            if ($updateAgentImage) {
                     if(\File::exists('images/' . $updateAgentImage)){
                    unlink('images/' . $updateAgentImage);
                }
            }

            if ($request->image !== null) {
                $file = $request->image;
                $destinationPath = "images";
                $fileName = $file->getClientOriginalName();
                $fileName = str_replace(' ', '', $fileName);
                Storage::putFileAs($destinationPath, $file, $fileName);
                $file->move($destinationPath, $fileName);
                $photoUrl = url('/images/' . $fileName);
            }
        }
        $updateprofile->name = $request->name;
        $updateprofile->email = $request->email;

        $updateprofile->password = $request->password;
        $updateprofile->image = $photoUrl;
        $updateprofile->save();

        return redirect()->back();
    }

    public function profile()
    {
        return view('profile');
    }

    public function getcontries()
    {
        $countries = countries::all();
        return view('adddoner', compact('countries'));
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





    public function findertable(Request $request)
    {
        $finder = finder::with('cityname')->when(isset($request->city), function ($q) use ($request) {
            $q->where('city', $request->city);
        })
            ->when(isset($request->state), function ($q) use ($request) {
                $q->where('state', $request->state);
            })
            ->when(isset($request->bloodgroup), function ($q) use ($request) {
                $q->where('bloodgroup', $request->bloodgroup);
            })->when(auth()->user()->id != 1,function($q){
                $q->whereCreatedBy(auth()->user()->id);
            })->get();     
                      

        $states = state::all();
        $cities = cities::all();

        return view('finder', compact('finder', 'states', 'cities'));
    }

    public function finderadd(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|max:20',
            'number' => 'required|max:10',
            'email' => 'required|email',
            'bloodgroup' => 'required',
            'address' => 'required',
            'country' => 'required',
            'state' => 'required',
            'city' => 'required',

        ]);

              $finder = $request->only(['name', 'number', 'email', 'address', 'bloodgroup',  'country', 'state', 'city']);
               $finder['created_by']= auth()->id();   
        $finder = finder::create($finder);

               return redirect('finder');
    }

    public function editfinder($id)
    {
        $countries = countries::all();
        $states = state::all();
        $cities = cities::all();

        $finder = finder::where('id', $id)->first();
        return view('editfinder', compact('finder', 'countries', 'states', 'cities'));
    }

    public function updatefinder(Request $request, $id)
    {
        $validated = $request->validate([
            'name' => 'required|max:20',
            'number' => 'required|max:10',
            'email' => 'required|email',
            'address' => 'required',
            'bloodgroup' => 'required',
            'country' => 'required',
            'state' => 'required',
            'city' => 'required',

        ]);

        $finder = $request->only(['name', 'number',  'email', 'address', 'bloodgroup',  'country', 'state', 'city']);
        finder::where('id', $id)->update($finder);
        return redirect('finder');
    }
    public function distroyfinder($id)
    {
        $finder = finder::find($id);
        $finder->delete();
        return redirect()->back();
    }

    public function getcontriesss()
    {
        $countries = countries::all();
        return view('addfinder', compact('countries'));
    }
}
