<?php

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

Route::get('/home', function () {
    return view('index');
});
Route::get('/add', function () {
    return view('adds');
});

Route::get('/about', function () {
    return view('about');
});


Route::get('/contact', function () {
    return view('contact');
});

Route::get('/cinema', 'MoviesController@index');


Route::group(['prefix' => 'bus'], function () {

    Route::get('/','CitysController@index');

    Route::post('/{id}', 'BusinfoController@index');

});

Route::group(['prefix' => 'busseats'], function () {

    Route::get('/', 'BusinfoController@show');
    
});

Route::get('/stadium','FootballFixturController@index');
Route::get('/selectedgame','FootballFixturController@show');

Route::get('/events','EventsController@index');
Route::get('/event','EventsController@show');

Route::get('/movie', 'CinemaplaceController@index');

Route::post('/checkmovie', 'MovieinfoController@show');
Route::post('/cinemmap', 'MovieinfoController@index');

Route::post('/payment', 'PaymentProcessForAll@store');
Route::get('/cinemaseat', function(){
    return view('cinemamap');
});
Route::get('/stadiumticket', 'StadiumTicket@index');
Route::get('/movieticket', 'MovieTicket@index');
Route::get('/busticket', 'BusTicket@index');
Route::get('/eventticket', 'EventTicket@index');
//Route::get('/stadiumticket', 'StadiumTicket@index');

Route::get('/paymentcanceled', 'paymentcancel@index');
