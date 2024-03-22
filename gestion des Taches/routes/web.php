<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

/*
Activez le serveur : php artisan sereve;
Affiche list des routes de votre projet : php artisan route:list;
Creer un controller : php artisan make:controller nom-controller;
creer un middleware : php artisan make:middleware nom-middleware;
*/ 

Route::get('/', function () {
    return view('welcome');
});

Route::get('/taches','App\Http\Controllers\TacheController@afficherTaches');
Route::get('/edit/{i}','App\Http\Controllers\TacheController@editTache');
Route::post('/update/{i}','App\Http\Controllers\TacheController@updateTache');
Route::delete('/supprimer/{i}','App\Http\Controllers\TacheController@supprimerTache');
Route::get('/ajouter',function(){
    return view('ajouterTache');
});
Route::post('/saveAjoute','App\Http\Controllers\TacheController@ajouterTache');
Route::post('/filter/{s}','App\Http\Controllers\TacheController@filtrerTache');
Route::get('/rechercher','App\Http\Controllers\TacheController@rechercherTaches');
Route::put('/terminer/{i}','App\Http\Controllers\TacheController@marquerTerminee');