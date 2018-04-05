<?php


use Illuminate\Support\Facades\Auth;

Auth::routes();

Route::get('/', function () {
    return redirect('admin');
});

Route::group(['prefix' => 'admin', 'middleware' => ['revalidate','auth']], function () {

    Route::get('/{status?}', 'AdminController@show')->name('admin');

    Route::post('/service_request/update', 'AdminController@updateStatus');

});

Route::get('/home', function (){
    return redirect('admin');
})->name('home');
