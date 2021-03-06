<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Backends\User;
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
           $this->setSuccessMessage('Insert Successfull');
          return redirect()->Route('index');
         } catch (Exception $e) {
          $this-setSuccessMessage($e->getMessage());
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
            $this->setErrorMessage('Invalite password');
            return redirect()->back();    
    }
    public function processLogout()
    {
        auth::logout();
        $this->setErrorMessage('logout  Successfull');
        return redirect()->Route('login');
    }
}
