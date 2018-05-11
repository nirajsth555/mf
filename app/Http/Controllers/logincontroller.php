<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\user;
use Auth;
use Session;
use Validator;
use Hash;

class logincontroller extends Controller
{
    //

    public function getAdminlogin(){
    	return view('admin.pages.examples.login');
    }

    public function postAdminlogin(Request $request){
    	$email= $request->get('email');
    	$password= $request->get('password');
    	if(Auth::attempt(['email'=>$email,'password'=>$password])){
    		return redirect('admin');
    	}
    	else{
    		return redirect('login')->with('success_message','Email and Password donot match');
    	}


    }

    public function getAddadmin(){
        $power=Auth::user()->power;
        if($power==1){
    	return view('admin.pages.examples.addadmin');
    }
    else{
        return redirect()->back();
    }
    }

    public function postAddadmin(Request $request){
        
       
    	$obj= new user;
    	$validation= Validator::make($request->all(),[
            'fullname'=>'required',
            'email'=>'required|unique:users,email,|Email',
            'password'=>'required|Same:confirmpassword',
            'confirmpassword'=>'required|Same:password',
            'type_admin'=>'required'

            
            
            
            ],['fullname.required'=>'Please enter full name',
            'email.unique'=>'Email already in use',
            'email.required'=>'Please enter a valid Email Address',
            'email.Email'=>'Please enter a valid email address',
            'password.same'=>'Password and Confirm Password donot match',
            'confirmpassword.same'=>'Password and Confirm Password donot match',
            'type_admin.required'=>'Please select the type of admin'

            ]);

            if($validation->fails()){
            return redirect()->back()->with('errors',$validation->errors());
            }
    	$obj->name= $request->get('fullname');
    	$obj->email= $request->get('email');
    	$obj->password =Hash::make($request->get('password'));
    	$obj->password =Hash::make($request->get('confirmpassword'));
    	$obj->power= $request->get('type_admin');
    	$result= $obj->save();
    	if($result){
    		return redirect('add-admin')->with('success_message','New Admin succesfully Added');
    	}
    	else{
    		return redirect('add-admin')->with('success_message','New Admin Couldnot be Added');
    	}
    
    
    }

    public function getLogout(){
    	Auth::logout();
    	return redirect('login')->with('success_message','You have been succesfully logged out');
    }
}
