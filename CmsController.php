<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\File;
use App\Models\Cms;

class CmsController extends Controller
{
    //

    public function  index(Request $request){   
       
        $input=Cms::all();  
      
        return view('cms',compact('input'));
    }


    public function  cms(){     
        return view('addcms');
    }


    public function editcms($id)
    {
        $input = Cms::where('id', $id)->first();
        return view('editcms', compact('input'));
    }


    public function updatecms(Request $request, $id)
    {      
        
        $input=$request->only(['name','content','snumber','status']);
       
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
     
        Cms::where('id', $id)->update($input);
         return redirect('index');
         
    }


    public function cmsadd(Request $request)    
    {
        
        $validated = $request->validate([
            'name' => 'required|max:20',
            'content' => 'required',
            'snumber' => 'required',
            'status' => 'required',
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

        $input=$request->only(['name','content','snumber','status']);
        $input['image'] =$photoUrl;
        $input = Cms::create($input);
      
        return redirect('cms');
    }


    public function distorycms($id)
    {
        $input = Cms::find($id);
        $input->delete();
        return redirect()->back();
    }
}
