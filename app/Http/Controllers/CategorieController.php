<?php

namespace App\Http\Controllers;

use App\Models\categorie;
use Illuminate\Http\Request;

class CategorieController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {
            $categorie = Categorie::all();
            return response()->json($categorie);
        }catch (\Exception $e) {
        return response()->json(["erreur de récupération des données"]);
        }
        
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            $categorie = new Categorie(
               ["nomcategorie"=>$request ->input("nomcategorie"),
               "imagecategorie"=>$request ->input("imagecategorie"),
               ]);
               $categorie->save();  
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
            $categorie = Categorie::FindOrFail($id);
            return response()->json($categorie,200);
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
            $categorie = Categorie::FindOrFail($id);
            $categorie->update($request ->all());
            return response()->json($categorie);
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
            $categorie = Categorie::FindOrFail($id);
            $categorie->delete();
            return response()->json("categorie supprimée avec succées",200);
        }
        catch(\Exception $e){
            return response()->json(["!n'existe pas {$e ->getMessage()} "]);
        }

    }
}