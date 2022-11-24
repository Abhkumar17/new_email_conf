<?php
  
use Illuminate\Support\Facades\Route;
  
use App\Http\Controllers\SearchController;
use App\Http\Controllers\StutudentController;
  
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
  
Route::controller(SearchController::class)->group(function(){
    Route::get('demo-search', 'index');
    Route::get('autocomplete', 'autocomplete')->name('autocomplete');
});


Route::controller(StutudentController::class)->group(function(){
    Route::get('/', 'index');
    Route::post('student', 'addstudent')->name('student');

});