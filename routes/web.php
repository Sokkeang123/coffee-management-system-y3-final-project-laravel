<?php

use App\Http\Controllers\CoffeeController;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/', function () {
    return redirect()->route('coffees.index');
});
Route::resource('coffees', CoffeeController::class);
