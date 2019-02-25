<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use Auth;
use Redirect;
use Illuminate\Support\Facades\Input;
use App\user;

class loginController extends Controller
{
    //
    public function showLogin()
    {
      return view('login');

    }

    public function doLogin(request $request)
    {

      $this->validate($request, [
   'username'   => 'required|min:3',
   'password'  => 'required|min:3'
  ]);

  $user_data = array(
   'username'  => $request->get('username'),
   'password' => $request->get('password')
  );

  if(Auth::attempt($user_data))
  {
   return redirect('/user/{Auth::user()->id}');
  }
  else
  {

    $x=array(
      "message"=>"login failed,please make sure u type in the correct username and password"
    );
    return view ('login',compact('x'));
  // return back()->with('error', 'Wrong Login Details');
  }
    }

    public function doUser(){

      $user=Auth::user()->all();
      return view ('user');
    }

    public function logout(){
      Auth::logout();
     return redirect('/');
    }

    public function edit(){
      return view ('edit');
    }

    public function update(request $request,user $user)
    {

        $rules=array(
          'username'=>'required|min:3',
          'email'=>'required|email'
        );
        $this->validate(request(), [
            'username' => 'required|min:3|unique:users,username',
            'email' => 'required|email',
        ]);

        $user->username = request('username');
        $user->email = request('email');

        $user->save();
        return redirect('/user/{Auth::user()->id}')->with('alert', 'Updated!');
      /*  $this->validate($request, [
     'username'   => 'required|min:3',
     'email'  => 'required|email'
   ]); */

  /* $user->update (request([
     'username'   => 'required|min:3',
     'email'  => 'required|email'

   ])); */
  /*  user::update(request()->validate([
      'username'=>['required','min:3','max:255'],
      'email'=>['required','email','min:3']

    ]));*/
      //  $validator=Validator::make(Input::all(),$rules);
      /*  if ($validator->fails()){

            return Redirect::to('/user/{Auth::user()->id}/edit');

        }else {


        }  */

    //  $user->update(request (['username','email']));
          //  return view ('/login');

    }
}
