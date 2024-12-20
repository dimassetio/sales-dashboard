<?php

/**
 * Pages Routes
 */

use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
  return redirect()->route('home');
});
Route::get('about', ['as' => 'about', function () {
  return view('pages.about');
}, 'middleware' => ['web', 'auth']]);
Route::get('home', 'HomeController@index')->name('home')->middleware(['web', 'auth']);

Route::get('productYearlyReport', 'HomeController@productYearlyReport')->name('home.productYearlyReport')->middleware(['web', 'auth']);
Route::get('productMonthlyReport', 'HomeController@productMonthlyReport')->name('home.productMonthlyReport')->middleware(['web', 'auth']);