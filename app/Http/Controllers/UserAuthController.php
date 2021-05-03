<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use DB;

class UserAuthController extends Controller
{
    function login()
    {
        return view('auth.login');
    }

    function register()
    {
        return view('auth.register');
    }

    function create(Request $request)
    {
        // Validate request;
        $request->validate([ 
            'name'=>'required',
            'email'=>'required|email|unique:users',
            'password'=>'required|min:3|max:12'
        ]);

        // If form validate success, then register new user
        // $user = new User;
        // $user->name = $request->name;
        // $user->email = $request->email;
        // $user->password = Hash::make($request->password);
        // $query = $user->save();
        
        // Use query builder
        $query = DB::table('users')
                ->insert([
                    'name'      =>  $request->name,
                    'email'     =>  $request->email,
                    'password'  =>  Hash::make($request->password)
                ]);
        if($query){
            return back()->with('success', 'You have been successfully registed');
        }else
        {
            return back()->with('fail', 'something went wrong!');
        }


    }
    function check(Request $request){
        // validate request
        $request->validate([
            'email'=> 'required|email',
            'password'=>'required|min:3|max:12'
        ]);
         // If form validate success, them process login
         //$user = User::where('email','=', $request->email)->first();
         $user = DB::table('users')
                    ->where('email', $request->email)
                    ->first();

         if($user){
            if(Hash::check($request->password, $user->password)){
                // if password match, then redirect to profile
                $request->session()->put('LoggerUser', $user->id);
                return redirect('profile');
            }else
            {
                return back()->with('fail','Invail password');
            }
         }else
         {
            return back()->with('fail', 'Not account found for this email');
         }
    }
    function profile(){
        if(session()->has('LoggerUser')){
            //$user = User::where('id','=', session('LoggerUser'))->first();
            $user = DB::table('users')
                        ->where('id', session('LoggerUser'))
                        ->first();
            $data = [
                'LoggerUserInfo'=>$user

            ];
        }
        return view('admin.profile', $data);
    }
    function logout(){
        if(session()->has('LoggerUser')){
            session()->pull('LoggerUser');
            return redirect('login');
        }
    }
}
