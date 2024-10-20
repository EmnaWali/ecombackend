<?php

namespace App\Http\Controllers;

use App\Models\Scategorie;
use Illuminate\Http\Request;

class ScategorieController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {
            $scategories = Scategorie::with("categorie")->get();
            return response()->json($scategories);
        }catch (\Exception $e) {
        return response()->json([$e->getMessage()]);
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            $scategories = new Scategorie(
               ["nomscategorie"=>$request ->input("nomscategorie"),
               "imagescategorie"=>$request ->input("imagescategorie"),
               "categorieID"=> $request ->input("categorieID"),
               ]);
               $scategories->save();  
        }catch (\Exception $e ){
            return response()->json(["erreur d'insertion {$e-> getMessage()}"]);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        try 
        {
            $scategorie = Scategorie::with ("categorie")->FindOrFail($id);
            return response()->json($scategorie,200);
        }
        catch(\Exception $e)
        {
            return response()->json(["!n'existe pas {$e ->getMessage()} "]) ;
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        try {
            $scategorie = Scategorie::FindOrFail($id);
            $scategorie->update($request ->all());
            return response()->json($scategorie);
        }
        catch(\Exception $e){
            return response()->json(["!Erreur de modification} "]);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        try {
            $scategorie = Scategorie::FindOrFail($id);
            $scategorie->delete();
            return response()->json("sous categorie supprimée avec succées",200);
        }
        catch(\Exception $e){
            return response()->json(["!n'existe pas {$e ->getMessage()} "]);
        }
    }
}