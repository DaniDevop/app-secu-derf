<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginUsersRequest;
use App\Models\EcoleStage;
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


       public function EcoleView(){
       

       $ecoles=EcoleStage::all();

      return view('users.ecole',compact('ecoles'));
      }


      public function addEcole(Request $request){

       $credentials = $request->validate([
            'nom_ecole' => ['required'],
            'adresse' => ['required'],
        ]);

        $ecole= new EcoleStage();
        $ecole->nom_ecole=$credentials['nom_ecole'];
        $ecole->adresse=$credentials['adresse'];
        $ecole->save();
        toastr()->info('Ecole ajouté avec success !');
        return back();

      }



      public function editEcole($id){
       $ecole=EcoleStage::find($id);
       if(!$ecole){
        toastr()->warning('Ecole introuvable ! ! ! ');

        return back();
       }

       return view('users.ecole.edit',compact('ecole'));
      }


      public function editEcolePost(Request $request){


       $credentials = $request->validate([
            'nom_ecole' => ['required'],
            'adresse' => ['required'],
            'id' => ['required'],
        ]);

         $ecole=EcoleStage::find($request->id);
       if(!$ecole){
        toastr()->warning('Ecole introuvable ! ! ! ');

        return back();
       }

        $ecole->nom_ecole=$credentials['nom_ecole'];
        $ecole->adresse=$credentials['adresse'];
        $ecole->save();
        toastr()->info('Information modifié avec success ! ! !');
        return back();

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
