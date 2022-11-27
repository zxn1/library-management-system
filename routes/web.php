<?php

use App\Http\Controllers\Controller;
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
Route::group(['middleware' => 'auth:sanctum'], function(){
//All secure URL's

});


/*Route::get('/', function () {
    return view('test', ['data' => 'ayam']);
});*/

//Route::get("/test",[Controller::class,'test']);
Route::get('/', function() {
    return view('login');
})->name('login');
Route::post('/loginGet', [Controller::class, 'login']);

Route::post('/getRegister', [Controller::class, 'registerAdmin']);

Route::get('/register', [Controller::class, 'register'])->name('register');