<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\EconomicSystem\CreditController;
use App\Http\Controllers\EconomicSystem\PurchaseController;
use App\Http\Controllers\VideogameSystem\VideogameController;
use App\Http\Controllers\VideogameSystem\UserVideogameController;
use App\Http\Controllers\VideogameSystem\VideogamePageController;
use App\Http\Controllers\LikeDislikeSystem\VideogameLikeController;
use App\Http\Controllers\LikeDislikeSystem\VideogameDislikeController;


Route::get('/', function () {
    return view('home');
})->name('home');

//Register
Route::get('/register',[RegisterController::class,'index'])->name('register');
Route::post('/register',[RegisterController::class,'store']);

//login
Route::get('/login',[LoginController::class,'index'])->name('login');
Route::post('/login',[LoginController::class,'store']);

//logout
Route::post('/logout',[LogoutController::class,'store'])->name('logout');

//User profile
Route::get('/users/{user:username}/profile',[UserVideogameController::class,'index'])->name('users.videogames');

//videogame page
Route::get('/videogames',[VideogameController::class,'index'])->name('videogames.index');
Route::get('/registervideogame',[VideogameController::class, 'registerIndex'])->name('videogames.registerIndex');
Route::post('/registervideogame',[VideogameController::class,'store'])->name('videogames.store');
Route::get('/videogames/{videogame}',[VideogameController::class,'show'])->name('videogames.show');

//videogame control
Route::get('/videogames/{videogame}/update',[VideogamePageController::class,'index'])->name('videogames.update.index');
Route::put('/videogames/{videogame}/update',[VideogamePageController::class,'update'])->name('videogames.update');
Route::delete('/videogames/{videogame}',[VideogamePageController::class,'destroy'])->name('videogames.destroy');

//like dislike system
Route::post('/videogames/{videogame}/likes',[VideogameLikeController::class,'store'])->name('videogame.likes');
Route::delete('/videogames/{videogame}/likes',[VideogameLikeController::class,'destroy'])->name('videogame.likes');
Route::post('/videogames/{videogame}/dislikes',[VideogameDislikeController::class,'store'])->name('videogame.dislikes');
Route::delete('/videogames/{videogame}/dislikes',[VideogameDislikeController::class,'destroy'])->name('videogame.dislikes');

//credit system
Route::get('/getcredit/{user:username}',[CreditController::class,'index'])->name('credit.index');
Route::put('/getcredit/{user}',[CreditController::class,'update'])->name('credit.update');

//Purchase system
Route::get('/buyvideogame/{videogame}',[PurchaseController::class,'index'])->name('buyVideogames.index');
Route::post('/buyvideogame/{videogame}',[PurchaseController::class,'buyVideogame'])->name('buyVideogames.buy');
