<?php

namespace App\Http\Controllers;

use App\Models\Portfolio;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class PortfolioController extends Controller
{
    public function index(){
        $portfolios = Portfolio::all();
        $page = "portfolio";

        return view("backoffice.portfolio.all",compact("page", "portfolios"));
            
    }


    public function destroy($id){
        $portfolio = Portfolio::find($id);
        $portfolio->delete();

        return redirect()->back();       
    }


    public function edit($id){
        $portfolio = Portfolio::find($id);
        $page = "portfolio";

        return view("backoffice.portfolio.edit", compact("portfolio","page"));       
    }


    public function update($id, Request $request){
       $portfolio = Portfolio::find($id);
       $portfolio->nom = $request->nom;
       $portfolio->lien = $request->lien;
       $portfolio->categorie = $request->categorie;
       $portfolio->description = $request->description;    
       $portfolio->updated_at = now();   

       $portfolio->save();

       return redirect()->route("portfolio");
    }


    public function create(){
        return view("backoffice.portfolio.create");
    }



    public function store(Request $request){
        $request->validate([
	        'nom' => 'required|max:30',
	        'lien' => 'required',
            'categorie' => 'required|max:50',
	        'description' => 'required|max:255',
	    ]);
        $portfolio = new portfolio;
        $portfolio->nom = $request->nom;
        $portfolio->lien = $request->file("lien")->hashName();
        $portfolio->categorie = $request->categorie;
        $portfolio->description = $request->description;
        $portfolio->created_at = now();   
 
        $portfolio->save();
        $request->file('lien')->storePublicly('img', 'public');
        return redirect()->route('portfolio')->with('message', 'The success message!');
    }

    public function download($id) {
        $portfolio = portfolio::find($id);
        return Storage::disk("public")->download("img/" . $portfolio->image);
    }

    public function show($id){
        $portfolios = portfolio::all();
        $portfolio = portfolio::find($id);
        $page = "portfolio";
        return view('backoffice.portfolio.show',compact('portfolio','portfolios',"page"));
    }
}
