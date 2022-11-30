<?php

use App\Http\Controllers\author;
use App\Http\Controllers\Controller;
use App\Http\Controllers\language;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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

//return view
Route::get('/', function() {
    if(!Auth::check())
    {
        return view('login');
    } else {
        return redirect()->route('dash');
    }
})->name('login');

Route::get('/dashboard', function() {
    if(!Auth::check())
    {
        return view('login');
    } else {
        return view('dash');
    }
})->name('dash');

Route::get('/register', function(){
    if(!Auth::check())
    {
        return view('register');
    } else {
        return redirect()->route('dash');
    }
})->name('register');

Route::get('/bookregister', function(){
    if(!Auth::check())
    {
        return redirect()->route('login');
    } else {
        return view('bookregister');
    }
})->name('bkreg');

Route::get('/addauthors', function()
{
    return view('addauthor');
})->name('addauthor');

Route::get('/registerLanguage', function()
{
    return view('insertlanguage');
})->name('langreg');


//go to controller
Route::post('/loginGet', [Controller::class, 'login']);

Route::get('/authors', [author::class, 'displayauthors'])->name('authors');

Route::post('/getRegister', [Controller::class, 'register']);

Route::get('/logout', [Controller::class, 'logout'])->name('logout');

Route::post('/registerAuthor', [author::class, 'addauthor'])->name('authreg');

Route::get('/removeAuthor/{id}', [author::class, 'deleteauthor']);

Route::get('/modifyAuthors/{id}', [author::class, 'passauthor']);

Route::post('/editauthor', [author::class, 'editauthor'])->name('editauth');

Route::get('/languages', [language::class, 'displaylanguages'])->name('lang');

Route::post('/getRegisterLanguages', [language::class, 'addLanguage'])->name('getlangreg');

Route::get('/deleteLanguage/{id}', [language::class, 'deleteLang']);

Route::get('/modifyLanguage/{id}', [language::class, 'passlang']);

Route::post('/editlanguage', [language::class, 'editlang'])->name('editlang');

