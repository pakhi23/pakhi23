<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\File;
use App\Models\cms;

class CmsController extends Controller
{
    //

    public function  index(Request $request){   
       
        $input=cms::all();  
  
        return view('pages',compact('input'));
    }


    public function  cms(){     
        return view('addpages');
    }


    public function editcms($id)
    {
        $input = cms::where('id', $id)->first();
        return view('editpages', compact('input'));
    }


    public function updatecms(Request $request, $id)
    {      
        
        $input=$request->only(['name','content','image']);
       
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $destinationPath = "images";
            $fileName = $file->getClientOriginalName();
            $fileName = str_replace(' ', '', $fileName);
            Storage::putFileAs($destinationPath, $file, $fileName);
            $file->move($destinationPath, $fileName);
            $photoUrl = url('/images/' . $fileName);
           
        }   
       
        $input['image'] =$photoUrl;
     
        cms::where('id', $id)->update($input);
         return redirect('index');
         
    }


    public function cmsadd(Request $request)    
    {
        
        $validated = $request->validate([
            'name' => 'required|max:20',
            'content' => 'required',
          
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
       

        if ($request->file('image')) {
            $file = $request->file('image');
            $destinationPath = "images";
            $fileName = $file->getClientOriginalName();
            $fileName = str_replace(' ', '', $fileName);
            Storage::putFileAs($destinationPath, $file, $fileName);
            $file->move($destinationPath, $fileName);
            $photoUrl = url('/images/' . $fileName);
        }

        $input=$request->only(['name','content','image']);
        $input['image'] =$photoUrl;
        $input = cms::create($input);
      
        return redirect('cms');
    }


    public function distorycms($id)
    {
        $input = Cms::find($id);
        $input->delete();
        return redirect()->back();
    }
}

