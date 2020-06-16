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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

// New Tickets
Route::get('/new-ticket', 'NewTicketController@index')->name('new-ticket');
Route::post('/new-ticket', 'NewTicketController@store')->name('post-new-ticket');


// Tickets
Route::get('/tickets', 'TicketController@index')->name('tickets');
Route::post('/ticket', 'TicketController@update')->name('update-ticket');
Route::get('/ticket/{guid}', 'PublicTicketController@show')->name('ticket');

Route::get('/all-tickets', 'TicketController@index_all')->name('all-tickets');