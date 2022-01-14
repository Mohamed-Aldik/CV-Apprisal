<?php

namespace App\Http\Controllers\Member\Auth;

use App\Http\Controllers\Controller;
use App\Models\Member;
use App\Models\Nationality;
use App\Http\Requests\Member\Auth\RegisterRequest;
use Illuminate\Support\Facades\Mail;
use App\Mail\RegisterMemberMail;
use Illuminate\Support\Facades\Auth;

class RegisterController extends Controller
{
   public function getRegister () {

    if (Auth::guard('member')->check()) 
    return redirect()->route('member');
    
        $nationalities=Nationality::select('name','id')->get();
       return view('member.auth.register',['nationalities'=>$nationalities]);

   } 

   public function postRegister (RegisterRequest $request) {
     // Available alpha caracters
     $characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';

     // generate a pin based on 1 * 7 digits + a random character
     $pin = mt_rand(1000000, 9999999)
         . $characters[rand(0, strlen($characters) - 1)];
     
     // shuffle the result
     $password = str_shuffle($pin);
     

      $member=new Member();
      $member->name = $request->name ;
      $member->email = $request->email ;
      $member->password = $password ;
      $member->nationality_id = $request->nationality ;
      $member->save();
      Mail::to($member->email)->send(new RegisterMemberMail($password));
      return redirect()->route('member.login');

 } 
}
