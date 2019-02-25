<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\user;
class registerController extends Controller
{
    //
    public function index(){

      return view ('register');
    }

    public function store(){

  /*    user::create( request()->validate( [
        'username'=>['required','min:3','max:255','unique:user,username'],
        'email'=>['required','email','unique:user,email'],
        'password'=>['required','min:3','max:10'],
        'password_confirm'=>['sometimes','required_with:password']

    ]));*/
        $this->validate(request(),[
            'username'=>['required','min:3','max:255','unique:users,username'],
            'email'=>['required','email','unique:users,email'],
            'password'=>['required','min:3','max:10'],
            'password_confirm'=>['same:password']

        ]);

        $user=new user;
        $user->username=request()->username;
        $user->password=bcrypt(request()->password);
        $user->email=request()->email;
        $user->save();

        return view('/login');


    }
}
