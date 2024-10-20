<?php

use App\Http\Controllers\ArticleController;
use App\Http\Controllers\CategorieController;
use App\Http\Controllers\ScategorieController;
use App\Models\Scategorie;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');
// Route::get('/categories',[CategorieController::class,'index']);
// Route::post('/categories',[CategorieController::class,'store']);
// Route::get("/categories/{id}", [CategorieController::class,"show"]);
// Route::delete("/categories/{id}", [CategorieController::class,"destroy"]);
Route::middleware('api')->group(function () {
    Route::resource('categorie',CategorieController::class);
});
Route::middleware('api')->group(function () {
    Route::resource('scategorie',ScategorieController::class);
});
Route::middleware('api')->group(function () {
    Route::resource('articles',ArticleController::class);
});
Route::get('/listarticles/{idscat}', [ArticleController::class,'showArticlesBySCAT']);

Route::get('/articles/art/articlespaginate', [ArticleController::class,
'articlesPaginate']);