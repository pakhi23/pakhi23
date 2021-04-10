<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\cms;


class FrontencController extends Controller
{
    

    public function index(){
        $input=cms::all();  
       
        
        return view('frontend.frontend',compact('input'));
    }

}
