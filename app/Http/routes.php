<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

//Route::get('/userlist',[
//    'uses' => 'users_controller@index',
//    'as' => 'user.index'
//]);
//
//Route::post('/regist',[
//    'uses' => 'users_controller@store',
//    'as' => 'user.store'
//]);
//
Route::get('/test',[
    'uses'  => 'Dashboard@test',
    'as'    => 'test'
]);

Route::post('/login',[
    'uses' => 'users_controller@getLogin',
    'as' => 'users.logIn'
]);
//
Route::get('/logout',[
    'uses' => 'Users_controller@getLogout',
    'as' => 'logout'
]);
//
Route::get('/article{article}/getAllPost',[
    'uses'  => 'Articles_controller@getAllPost',
    'as'    => 'getAllPost'
]);


Route::get('/',function(){
    return view('welcome');
})->name('home');

Route::get('/admin',[
    'uses'  => 'Dashboard@index',
    'as'    => 'admin'
]);

Route::get('/web',function(){
    return view('pages.web');
})->name('web');

Route::get('/Portfolio',function(){
    return view('pages.Portfolio');
})->name('Portfolio');

Route::get('/about',function(){
    return view('pages.about');
})->name('about');

Route::get('/concat',function(){
    return view('pages.concat');
})->name('concat');
Route::resource('users','Users_controller');
Route::resource('article','Articles_controller');

//Route::group(['middleware' => ['web']], function(){
//    
//});
