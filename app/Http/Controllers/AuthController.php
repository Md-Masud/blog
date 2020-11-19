<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;
use App\Models\User;
use Session;
class AuthController extends Controller
{
    public function showRegisterForm()
    {
    	return view('frontend.register');
    }
    public function processRegister(Request $request)
    {
    
    //dd($user);
    $this->validate($request,[
        'full_name' => 'required',
        'email' => 'required|unique:users',
        'password'=>'required|min:8|max:120',
        'phone'=>'required|unique:users',
        'address'=>'required',
    ]);
      $data=[
      	'full_name' =>$request->input('full_name') ,
        'email' =>$request->input('email'),
        'password'=>bcrypt($request->input('password')),
        'phone'=>$request->input('phone'),
        'address'=>$request->input('address'),
      ];
      try {
          User::create($data);
          Session::flash('message','Create  Successfull');
          Session::flash('type','Success');
          return redirect()->Route('index');
       } catch (Exception $e) {
          Session::flash('message',$e->getMessage());
          Session::flash('type','danger');
      }
      
     }
 
    public function showLoginForm()
    {
    	return view('frontend.login');
    }
    public function processLogin(Request $request)
    {
    	 $this->validate($request,[
           'email' => 'required',
           'password'=>'required',
         ]);
        $credentials = $request->only('email', 'password');
    	if (Auth::guard('web')->attempt($credentials)) {
    		return redirect()->Route('index');
       }
            Session::flash('message','Invalid password');
            Session::flash('type','danger');
            return redirect()->back();    
       }
}
