<?php
Route::get('/test',[
    'uses'  => 'Dashboard@test',
    'as'    => 'test'
]);

Route::post('/login',[
    'uses' => 'usersController@getLogin',
    'as' => 'users.logIn'
]);
//
Route::get('/logout',[
    'uses' => 'UsersController@getLogout',
    'as' => 'logout'
]);
//
Route::get('/article{article}/getAllPost',[
    'uses'  => 'ArticlesController@getAllPost',
    'as'    => 'getAllPost'
]);


Route::get('/',function(){
    return view('wellcome');
})->name('wellcome');

Route::get('/canvas',function(){
    return view('test');
})->name('canvas');

Route::get('/admin',[
    'uses'  => 'Dashboard@index',
    'as'    => 'admin'
]);

Route::get('/web',function(){
    return view('pages.web');
})->name('web');

Route::get('/portfolio',function(){
    return view('pages.portfolio');
})->name('portfolio');

Route::get('/about',function(){
    return view('pages.about');
})->name('about');

Route::get('/contact',function(){
    return view('pages.contact');
})->name('contact');

// Route::get('/pages/page-editor',function($id){
//     return view('dashboard.page-editor',$id);
// })->name('page.editor');

Route::get('/pages/{pages}/page-editor',[
    'uses' => 'PagesController@pageEditor',
    'as' => 'page.editor'
]);

Route::resource('users','UsersController');
Route::resource('article','ArticlesController');
Route::resource('pages','PagesController');


//Route::group(['middleware' => ['web']], function(){
//    
//});
