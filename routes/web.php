<?php

use App\Http\Controllers\author;
use App\Http\Controllers\barcodeController;
use App\Http\Controllers\bookController;
use App\Http\Controllers\categoryController;
use App\Http\Controllers\Controller;
use App\Http\Controllers\historyController;
use App\Http\Controllers\language;
use App\Http\Controllers\studentController;
use App\Models\category;
use App\Models\history;
use App\Models\students;
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

/*Route::get('/dashboard', function() {
    if(!Auth::check())
    {
        return view('login');
    } else {
        return view('dash');
    }
})->name('dash');*/

Route::get('/dashboard', [Controller::class, 'displayDashboard'])->name('dash');

//Route::get('/tester', [Controller::class, 'displayDashboard']);

Route::post('/register', [Controller::class, 'goRegisterAdmin'])->name('register');

/*Route::get('/bookregister', function(){
    if(!Auth::check())
    {
        return redirect()->route('login');
    } else {
        return view('bookregister');
    }
})->name('bkreg');*/

Route::get('/calcTotalBook/{id1}/{id2}', [Controller::class, 'calcTotalBook']);

Route::get('/bookregister', [categoryController::class, 'getCategoryName'])->name('bkreg');

Route::post('/getBookRegister', [bookController::class, 'getRegister'])->name('databookreg');

Route::get('/addauthors', function()
{
    return view('addauthor');
})->name('addauthor');

Route::get('/registerLanguage', function()
{
    return view('insertlanguage');
})->name('langreg');

Route::get('/addCategory', function()
{
    return view('addCategory');
})->name('categoryadd');

Route::get('/registerStudent', function(){
    return view('registerstudent');
})->name('regStud');

Route::get('/addBookLoan', function()
{
    return view('addBookloan');
})->name('addbkloan');

Route::get('/barcode', function()
{
    return view('scanBarCode');
})->name('barcode');

Route::get('/returnBookWBarcode', function()
{
    return view('returnbookchoose');
})->name('returnwbarcode');

Route::post('/procReturnWithBarcode', [barcodeController::class, 'procReturnWithBarcode'])->name('procRetWBar');

Route::get('/bookLoan', [bookController::class, 'displayBookLoan'])->name('bkloan');

//go to controller
Route::post('/loginGet', [Controller::class, 'login']);

Route::get('/authors', [author::class, 'displayauthors'])->name('authors');

Route::post('/authorssearch', [author::class, 'displayauthorsbysearch'])->name('authorssrch');

Route::post('/getRegister', [Controller::class, 'register']);

Route::get('/logout', [Controller::class, 'logout'])->name('logout');

Route::post('/registerAuthor', [author::class, 'addauthor'])->name('authreg');

Route::get('/removeAuthor/{id}', [author::class, 'deleteauthor']);

Route::get('/modifyAuthors/{id}', [author::class, 'passauthor']);

Route::post('/editauthor', [author::class, 'editauthor'])->name('editauth');

Route::get('/languages', [language::class, 'displaylanguages'])->name('lang');

Route::post('/languagesSearch', [language::class, 'displaylanguagesbysearch'])->name('langsrch');

Route::post('/getRegisterLanguages', [language::class, 'addLanguage'])->name('getlangreg');

Route::post('/getRegisterCategory', [categoryController::class, 'addCategory'])->name('getCateReg');

Route::get('/deleteLanguage/{id}', [language::class, 'deleteLang']);

Route::get('/modifyLanguage/{id}', [language::class, 'passlang']);

Route::post('/editlanguage', [language::class, 'editlang'])->name('editlang');

Route::get('/category', [categoryController::class, 'displaycategory'])->name('category');

Route::post('/categorySearch', [categoryController::class, 'displaycategorybysearch'])->name('categorysrc');

Route::get('/deleteCategory/{id}', [categoryController::class, 'deleteCategory']);

Route::get('/modifyCategory/{id}', [categoryController::class, 'passcategory']);

Route::post('/editCategory', [categoryController::class, 'editcategory'])->name('editcate');

Route::get('/booklist', [bookController::class, 'displaybooks'])->name('bklst');

Route::get('/categoryquery/{search}', [categoryController::class, 'getCategoryName']);

Route::get('/authorquery/{search}', [categoryController::class, 'getAuthorName']);

Route::get('/languagequery/{search}', [categoryController::class, 'getLangName']);

Route::get('/removeBook/{id}', [bookController::class, 'removeBook']);

Route::get('/modifybooks/{id}', [bookController::class, 'modifyBookdisplay']);

Route::post('/getModifybooksDetails', [bookController::class, 'modifyBooks'])->name('modifBook');

Route::get('/viewBooks/{id}', [bookController::class, 'viewBook'])->name('viewbks');

Route::post('/searchbytitle', [bookController::class, 'searchbookbytitle'])->name('searchbooktitle');

Route::post('/searchbypublisher', [bookController::class, 'searchbookbypublisher'])->name('searchbookpublish');

Route::post('/searchbyauthor', [bookController::class, 'searchbookbyauthor'])->name('searchbookauth');

Route::post('/searchbyyearpublished', [bookController::class, 'searchbookbyyearpublished'])->name('srchbookbypublished');

Route::post('/searchbyyearacquisition', [bookController::class, 'searchbookbyyearacquisition'])->name('srchbookbyacquisition');

Route::post('/registerStudent', [studentController::class, 'registerStudent'])->name('regstud');

Route::get('/students', [studentController::class, 'displaystudents'])->name('stdnts');

Route::get('/deleteStudent/{unique_id}', [studentController::class, 'deleteStudent']);

Route::post('/searchStudent', [studentController::class, 'displaystudentsbysearch'])->name('srchstud');

Route::post('/studentUnique', [studentController::class, 'studentsbysearchunique'])->name('uniqueStud');

Route::post('/studentModify', [studentController::class, 'getModifyStudent'])->name('modifStud');

Route::get('/modifyStudent/{unique_id}', [studentController::class, 'modifyStudent']);

Route::get('/viewStudent/{id}', [studentController::class, 'viewStudent']);

Route::get('/bookName/{search}', [bookController::class, 'bookQuery']);

Route::get('/studname/{search}', [studentController::class, 'studQuery']);

Route::post('/bookLoanRegister', [bookController::class, 'getRegBookLoan'])->name('bookloanReg');

Route::post('/searchBookloanByName', [bookController::class, 'searchbookloanbystudent'])->name('srchbklnname');

Route::post('/searchBookloanByUniqueID', [bookController::class, 'searchbookloanbyunique'])->name('srchbklnid');

Route::get('/deleteBookloan/{id}', [bookController::class, 'deleteBookLoan']);

Route::get('/unavailableBook', [bookController::class, 'searchunavailablebook'])->name('borrowed');

Route::get('/lateLoanbook', [bookController::class, 'searchbookloanlate'])->name('lateLoan');

Route::get('/penaltyCharge/{id}', [bookController::class, 'penaltyPay']);

Route::get('/payPenalty/{id}', [bookController::class, 'payPenalty']);

Route::get('/returnBookComplete/{id}', [bookController::class, 'doneReturnBook']);

Route::post('/returnBookDone', [bookController::class, 'doneReturnBook'])->name('retBookComplete');

Route::get('/setting', [Controller::class, 'displaySetting'])->name('setting');

Route::post('/setPenaltyCharge', [Controller::class, 'setPenaltyCharge'])->name('setCharge');

Route::post('/setNewAdminKey', [Controller::class, 'setNewKey'])->name('setNewKey');

Route::get('/viewBooksBorrowed/{id}', [studentController::class, 'viewBooksBorrowed']);

Route::post('/viewLoanByName', [bookController::class, 'viewLoanByName'])->name('viewLoanBName');

Route::post('/viewLoanByDate', [bookController::class, 'viewLoanByRangeDate'])->name('viewLoanBDate');

Route::post('/viewLoanByYear', [bookController::class, 'viewLoanByRangeYear'])->name('viewLoanBYear');

Route::get('/viewLoanByLate/{id}', [bookController::class, 'specificLateReturnBook']);

Route::post('/barcodeToBorrow', [barcodeController::class, 'barcodeToIssue'])->name('bar2bor');

Route::post('/processingDetails', [barcodeController::class, 'registerLoanDetails'])->name('ProcBar');

Route::get('/checkAvailability/{id}', [barcodeController::class, 'checkAvailability']);

Route::post('/dashboardFilter', [Controller::class, 'displayDashboardWithFilter'])->name('dashfilter');

Route::post('/updateAccProfile', [Controller::class, 'updateProfileImage'])->name('upAcProf');

Route::get('/report', [historyController::class, 'getReport'])->name('report');

Route::post('/reportFilter', [historyController::class, 'filterReport'])->name('rptfilter');

Route::get('/report/export/', [historyController::class, 'export2excel'])->name('exportreport');