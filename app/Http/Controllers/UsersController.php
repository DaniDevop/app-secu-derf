<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginUsersRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

use function Flasher\Toastr\Prime\toastr;

class UsersController extends Controller
{
    //


      public function loginPage(){
        
   /*    User::create([
        'name'=>'admin',
        'email'=>'admin@mail.com',
         'prenom'=>'admin',
        'tel'=>'0000',
         'profile'=>'',
          'role'=>'admin',
           'grade'=>'captain',
        'password'=>Hash::make('admin'),
      ]); */
      return view('index');
      }


      public function dashboard(){

      return view('users.index');
      }

    public function doLogin(LoginUsersRequest $request){

        
        $credentials = $request->validate([
            'name' => ['required'],
            'password' => ['required'],
        ]);
 
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
 
            flash()->success('Bienvenu');

        return redirect()->route('users.dashboard');
        }
        flash()->warning('Information incorrecte.');

        return back();
    }
}
