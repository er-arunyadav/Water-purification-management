<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use Hash;
use Auth;
use App\User;

class ProfileController extends Controller
{
        public function index()
    {
        $user = Auth::user();
        $data['title'] = 'Settings';
        return view('profile.index',[
            'data' => $data,
            'user' => $user
        ]);
    }
    
    public function update(Request $request, $id){
        
         $this->validate($request,[
            'name' => 'required',
            'old_password'=>'required',
            'new_password' => 'required'
        ]);
        
        $op = $request->old_password;
        $np = $request->new_password;
        $current_password = Auth::user()->password;  
        
      if(Hash::check($op, $current_password)){
       
        $user = User::find($id);
        
        $user->email =  $request->email;
        $user->name =  $request->name;
        $user->password =  Hash::make($np);
        $user->save();
        Session::flash('success','Profile updated successfully');
        return redirect()->back();
      }else{
          Session::flash('info','Old Password is incorrect');
          return redirect()->back(); 
      }
    }
    
}
