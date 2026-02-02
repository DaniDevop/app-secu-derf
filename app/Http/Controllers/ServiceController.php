<?php

namespace App\Http\Controllers;

use App\Models\ServiceAgent;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
   
       public function ServicesView(){
       

       $services=ServiceAgent::all();

      return view('users.services.index',compact('services'));
      }




         public function addservice(Request $request){

       $credentials = $request->validate([
            'nom_services' => ['required'],
        ]);

        $service= new ServiceAgent();
        $service->nom_services=$credentials['nom_services'];
        $service->save();
        toastr()->info('service ajouté avec success !');
        return back();

      }




      
      public function editServices($id){
       $service=ServiceAgent::find($id);
       if(!$service){
        toastr()->warning('Services introuvable ! ! ! ');

        return back();
       }

       return view('users.services.edit',compact('service'));
      }




        public function editServicesPost(Request $request){


       $credentials = $request->validate([
            'nom_services' => ['required'],
            'id' => ['required'],
        ]);

         $service=ServiceAgent::find($request->id);
       if(!$service){
        toastr()->warning('Ecole introuvable ! ! ! ');

        return back();
       }

        $service->nom_services=$credentials['nom_services'];
        $service->save();
        toastr()->info('Information modifié avec success ! ! !');
        return back();

      }


}
