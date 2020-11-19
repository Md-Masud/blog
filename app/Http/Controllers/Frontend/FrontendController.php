<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Session;


class FrontendController extends Controller
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
    	return view('index',$data);
    }
    public function registation()
    {
    	return view('frontend.register');
    	 //return view('backend.pages.categorycreate');     
    }
    public function store(Request $request)
    {
       // $validatedData = $request->validate([
        //'name' => 'required|unique:countrys|',
    //]);
        // old value include //custom validator
       // $validator = Validator::make($request->all(), [
           // 'title' => 'required|unique:posts|max:255',
          //  'body' => 'required',
       /// ]);

       // if ($validator->fails()) {
           // return redirect('post/create')
                       // ->withErrors($validator)
                      //  ->withInput();
      //  }
        //default validation
        $this->validate($request,[
            "name"=>"required",
            "photo"=>"required",
        ]);
        // file upload
        $photo=$request->file('photo');
       //echo $path = $request->photo->path();
       //echo $extension = $request->photo->extension();
        //die();
        $fileName=uniqid('photo_',true).Str::random(10).'.'.$photo->getClientOriginalName();
        if ($request->hasFile('photo')) {
          $photo->storeAs('images', $fileName);

          }
           Session::flash('Success','Create  Successfull');
       return redirect()->back();
        
    }
    public function login()
    {
    	return view('frontend.login');
    }
}
