<?php



use Illuminate\Support\Facades\Auth;

Auth::routes();

Route::get('/', function () {
    return redirect('site');
});
Route::get('/logout' , 'AuthController@logout');

Route::group(['prefix' => 'admin', 'middleware' => ['auth']], function () {

    Route::get('/', 'ProductController@index')->name('admin');

    Route::get('/add-product', 'ProductController@add');
    Route::post('/add-product', 'ProductController@create');
    Route::get('/edit-product/{id}', 'ProductController@edit');
    Route::get('/delete-product/{id}', 'ProductController@delete');
    Route::get('/view-product/{id}', 'ProductController@view');
});

// Route::get('/home', function (){
//     return redirect('admin');
// })->name('home');


Route::get('/site', 'HomeController@index')->name('site-index');

Route::post('/site', 'HomeController@siteSearch');

Route::post('/product-enquiry', 'HomeController@productEnquiry');

Route::get('/register', 'HomeController@register')->name('register');
Route::post('/register', 'HomeController@createUser');

Route::get('/site/product-detail/{id}', 'HomeController@productDetail')->name('site-product-detail');
