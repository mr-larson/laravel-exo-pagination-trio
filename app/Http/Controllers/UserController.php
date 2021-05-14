<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    public function index(){
        $user = User::all();
        $page = "user";

        return view("backoffice.user.all",compact("user","page"));       
    }


    public function destroy($id){
        $user = User::find($id);
        $user->delete();

        return redirect()->back();       
    }


    public function edit($id){
        $user = User::find($id);
        $page = "user";

        return view("backoffice.user.edit", compact("user","page"));       
    }


    public function update($id, Request $request){
       $user = User::find($id);
       $user->nom = $request->nom;
       $user->prenom = $request->prenom;
       $user->age = $request->age;   
       $user->email = $request->email;
       $user->password = $request->password;
       $user->photo = $request->photo;
       $user->updated_at = now();   

       $user->save();

       return redirect()->route("user");
    }


    public function create(){
        return view("backoffice.user.create");
    }


    public function store(Request $request){
        $request->validate([
	        'nom' => 'required|max:30',
	        'prenom' => 'required|max:30',
            'age' => 'required|integer',
	        'email' => 'required|unique:users',
            'password' => 'required',
            'photo' => 'required'
	    ]);
        $user = new User;
        $user->nom = $request->nom;
        $user->prenom = $request->prenom;
        $user->age = $request->age;   
        $user->email = $request->email;
        $user->password = $request->password;
        $user->photo = $request->file('photo')->hashName(); 
        $user->updated_at = now();   
 
        $user->save();
        $request->file('photo')->storePublicly('img', 'public');
 
        return redirect()->route('user')->with('message', 'The success message!');;
    }

    /* public function download($id) {
        $user = Photo::find($id);
        return Storage::disk("public")->download("img/" . $user->photo);
    } */
}
