<?php

use App\Http\Controllers\ServiceController;
use App\Http\Controllers\PortfolioController;
use App\Http\Controllers\UserController;
use App\Models\Portfolio;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    $page="home";
    $portfolios= Portfolio::all();
    return view('home', compact("page","portfolios"));
})->name("home");

Route::get('/nav', function () {
    
    return view('nav');
})->name("nav");

Route::get('/footer', function () {
    
    return view('footer');
})->name("footer");


//User
//ALL
Route::get('/user', [UserController::class, "index"])->name("user");

//DELETE
Route::post('/user/{id}/delete', [UserController::class, "destroy"]);

//EDIT
Route::get("/user/{id}/edit",[UserController::class, "edit"]);

//UPDATE
Route::post("/user/{id}/update",[UserController::class, "update"]);

//CREATE
Route::get("user/create", [UserController::class, "create"]);

//STORE
Route::post("/user/store", [UserController::class, "store"]);

//Download
Route::post("/user/{id}/download", [UserController::class, "download"]);


//Service
//ALL
Route::get('/service', [ServiceController::class, "index"])->name("service");

//DELETE
Route::post('/service/{id}/delete', [ServiceController::class, "destroy"]);

//EDIT
Route::get("/service/{id}/edit",[ServiceController::class, "edit"]);

//UPDATE
Route::post("/service/{id}/update",[ServiceController::class, "update"]);

//CREATE
Route::get("service/create", [ServiceController::class, "create"]);

//STORE
Route::post("/service/store", [ServiceController::class, "store"]);

//Download
Route::post("/user/{id}/download", [ServiceController::class, "download"]);

//PORTFOLIO
//ALL
Route::get('/portfolio', [PortfolioController::class, "index"])->name("portfolio");

//DELETE
Route::post('/portfolio/{id}/delete', [portfolioController::class, "destroy"]);

//EDIT
Route::get("/portfolio/{id}/edit",[portfolioController::class, "edit"]);

//UPDATE
Route::post("/portfolio/{id}/update",[portfolioController::class, "update"]);

//CREATE
Route::get("portfolio/create", [portfolioController::class, "create"]);

//STORE
Route::post("/portfolio/store", [portfolioController::class, "store"]);

//Download
Route::post("/portfolio/{id}/download", [portfolioController::class, "download"]);

//SHOW
Route::get("/portfolio/{id}/show", [portfolioController::class, "show"]);
