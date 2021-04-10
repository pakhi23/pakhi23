<?php

namespace App\Http\Controllers;
use App\Jobs\SendEmailJob;
use App\Mail\sendemail;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class mailController extends Controller
{
    //
   public function mail(Request $request){
 
	$details['email'] = 'apurvasoni504@gmail.com';
      dispatch(new SendEmailJob($details));
    //   dd('send');
    }


   
}
