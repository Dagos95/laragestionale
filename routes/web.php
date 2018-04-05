<?php

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

Auth::routes();  // Sono tutte le routes predefiniti di Laravel

Route::get('/home', 'HomeController@index')->name('home');

Route::middleware('auth')->group( function(){ // middleware (in questo caso) controlla se l'utente è loggato
                                              // Se è loggato passa, se non è loggato middleware lo butta fuori

Route::model('user', App\User::class);

    Route::resource('users', 'UserController', [
        'except' => [ 'show' ]
    ]); // In questo caso permette di creare la route senza specificarlo
    
});
