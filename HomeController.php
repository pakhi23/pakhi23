<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\donor;
use App\Models\finder;
use App\Models\state;
use App\Models\cities;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
       
        $count= array(          
            "donor_count" =>  donor::when(auth()->user()->id != 1,function($q){
                $q->where('created_by',auth()->user()->id);
            })->count(),
            "finder_count" => finder::when(auth()->user()->id != 1,function($q){
                $q->where('created_by',auth()->user()->id);
                  })->count(),
            "city_count" => cities::count(),
            "state_count" => state::count(),
        );
        return view('home')->with('count',$count);
    }
}

