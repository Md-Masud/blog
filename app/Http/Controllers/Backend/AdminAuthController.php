<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Backends\Admins;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Session;
class AdminAuthController extends Controller
{

    

     public function index()
    {
        $data=[];
        $data['current']=date("Y/m/d");
        $data['links']=[
            'facebook'=>'facebook.com',
            'youtube'=>'https://www.youtube.com',
            'google'=>'https://www.google.com'
        ];
        return view('backend.adminindex',$data);
    }
    
     public function showRegisterForm()
    {
        return view('backend.adminreg');
    }
    public function processRegister(Request $request)
    {
    
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
          admins::create($data);
           $this->setSuccessMessage('Insert Successfull');
          return redirect()->Route('index');
         } catch (Exception $e) {
          $this-setSuccessMessage($e->getMessage());
         }
      
     }
 
   
    public function showLoginForm()
    {
        return view('backend.login');
    }
    public function AprocessLogin(Request $request)
    {
         $this->validate($request,[
           'email' => 'required',
           'password'=>'required',
         ]);
         //dd($request->all());
        $credentials = $request->only('email', 'password');
          if (Auth::guard('admin')->attempt($credentials)) {
            return redirect()->Route('adminindex');
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
