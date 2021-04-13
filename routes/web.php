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

//HOME
Route::get('/', 'App\Http\Controllers\FrontController@index')->name('home');

//LOG
Route::get('/loginForm','App\Http\Controllers\LoginController@show')->name('ShowLoginForm');
Route::post('/login','App\Http\Controllers\LoginController@login')->name('login');
Route::get('/logout', 'App\Http\Controllers\LoginController@logout')->name('logout');

//DETAIL FOR SINGLE MENU
Route::get('/single/{id}', 'App\Http\Controllers\FrontController@singleMenu')->name('SingleMenu');

//CONTACT
Route::post('/contact', 'App\Http\Controllers\FrontController@contact')->name('contact');

//TESTIMONIALS - FRONT
Route::post('/testimonials' , 'App\Http\Controllers\FrontController@insertTestimonials')->name('insertTestimonials');

//RESERVATIONS - FRONT
Route::post('/reservations', 'App\Http\Controllers\FrontController@insertReservations')->name('insertReservations');

//REGISTRATION USERS
Route::get('/korisnik', 'App\Http\Controllers\UserController@showCreateForm')->name('createUserForm');
Route::post('/korisnik/kreiraj', 'App\Http\Controllers\UserController@create')->name('createUser');

//USER PROFILE
Route::get('/user/profile/{id}', 'App\Http\Controllers\UserController@profile')->name('UserProfile');

//UPDATE YOUR DATA
Route::get('/user/data' , 'App\Http\Controllers\UserController@selectData')->name('SelectData')->middleware('userEdit');
Route::post('/user/update' , 'App\Http\Controllers\UserController@updateData')->name('EditData');
Route::get('/user/password/select/{id}', 'App\Http\Controllers\UserController@showResetPassword')->name('ShowReesetPassword');
Route::post('/user/password/update/{id}' , 'App\Http\Controllers\UserController@resetPassword')->name('resetPassword');

//COMMENTS
Route::group(['prefix' => '/user/comments'], function (){

    Route::post('/select/{menuId}', 'App\Http\Controllers\UserController@comment')->name('InsertComment');
    Route::get('/delete/{id}', 'App\Http\Controllers\UserController@deleteComment')->name('DeleteComment');
    Route::post('/edit/{id}', 'App\Http\Controllers\UserController@editComment')->name('EditComment');
    Route::get('/show/{id}', 'App\Http\Controllers\UserController@showComment')->name('ShowComment');

});


//ADMIN ROUTES
Route::group(['middleware' => 'admin'], function(){

//ADMIN HOME
Route::get('/admin', 'App\Http\Controllers\Admin\AdminController@admin')->name('admin');

//USERS
Route::group(['prefix' => '/admin/users'], function (){

    Route::get('/select' , 'App\Http\Controllers\Admin\UserAdminController@index')->name('SelectUser');
    Route::get('/createForm', 'App\Http\Controllers\Admin\UserAdminController@create')->name('CreateFormUser');
    Route::post('/create', 'App\Http\Controllers\Admin\UserAdminController@store')->name('CreateUser');
    Route::get('/delete/{id}', 'App\Http\Controllers\Admin\UserAdminController@destroy')->name('DeleteUser');
    Route::get('/show/{id}', 'App\Http\Controllers\Admin\UserAdminController@edit')->name('ShowUser');
    Route::post('/edit/{id}' , 'App\Http\Controllers\Admin\UserAdminController@update')->name('EditUser');
    Route::get('/search', 'App\Http\Controllers\Admin\UserAdminController@search')->name('SearchUser');
    Route::post('/resetPassword/{id}', 'App\Http\Controllers\Admin\UserAdminController@resetPassword')->name('ResetPassword');
});

//MENUS
Route::group(['prefix' => '/admin/menus'], function (){

    Route::get('/select', 'App\Http\Controllers\Admin\MenuController@index')->name('SelectMenu');
    Route::get('/creteForm', 'App\Http\Controllers\Admin\MenuController@create')->name('CreateFormMenu');
    Route::post('/create', 'App\Http\Controllers\Admin\MenuController@store')->name('CreateMenu');
    Route::get('/delete/{id}' , 'App\Http\Controllers\Admin\MenuController@destroy')->name('DeleteMenu');
    Route::get('/show/{id}','App\Http\Controllers\Admin\MenuController@edit')->name('ShowMenu');
    Route::post('/edit/{id}','App\Http\Controllers\Admin\MenuController@update' )->name('EditMenu');
});

//ROLES
Route::group(['prefix' => '/admin/roles'], function (){

    Route::get('/select', 'App\Http\Controllers\Admin\RoleController@index')->name('SelectRole');
    Route::get('/createForm', 'App\Http\Controllers\Admin\RoleController@create')->name('CreateForm');
    Route::post('/create', 'App\Http\Controllers\Admin\RoleController@store')->name('create');
    Route::get('/delete/{id}', 'App\Http\Controllers\Admin\RoleController@destroy')->name('DeleteRole');
    Route::get('/show/{id}', 'App\Http\Controllers\Admin\RoleController@edit')->name('ShowRole');
    Route::post('/edit/{id}', 'App\Http\Controllers\Admin\RoleController@update')->name('EditRole');

});

//RESERVATIONS
Route::group(['prefix' => '/admin/reservations'], function (){

    Route::get('/select', 'App\Http\Controllers\Admin\ReservationController@index')->name('SelectReservation');
    Route::get('/createForm', 'App\Http\Controllers\Admin\ReservationController@create')->name('CreateFormReservation');
    Route::post('/create','App\Http\Controllers\Admin\ReservationController@store')->name('createReservation');
    Route::get('/delete/{id}', 'App\Http\Controllers\Admin\ReservationController@destroy')->name('DeleteReservation');
    Route::get('/show/{id}','App\Http\Controllers\Admin\ReservationController@edit')->name('ShowReservation');
    Route::post('/edit/{id}', 'App\Http\Controllers\Admin\ReservationController@update')->name('EditReservation');
});

//SOCIALS
Route::group(['prefix' => '/admin/socials'], function (){

    Route::get('/select' , 'App\Http\Controllers\Admin\SocialController@index')->name('SelectSocial');
    Route::get('/createForm', 'App\Http\Controllers\Admin\SocialController@create')->name('CreateFormSocial');
    Route::post('/create' , 'App\Http\Controllers\Admin\SocialController@store')->name('CreateSocial');
    Route::get('/delete/{id}', 'App\Http\Controllers\Admin\SocialController@destroy')->name('DeleteSocial');
    Route::get('/show/{id}', 'App\Http\Controllers\Admin\SocialController@edit')->name('ShowSocial');
    Route::post('/edit/{id}', 'App\Http\Controllers\Admin\SocialController@update')->name('EditSocial');
});

//TESTIMONIALS
Route::group(['prefix' => '/admin/testimonials'], function (){

    Route::get('/select', 'App\Http\Controllers\Admin\TestimonialController@index')->name('SelectTestimonial');
    Route::get('/delete/{id}', 'App\Http\Controllers\Admin\TestimonialController@destroy')->name('DeleteTestimonial');
    Route::get('/createForm' , 'App\Http\Controllers\Admin\TestimonialController@create')->name('CreateFormTestimonial');
    Route::post('/create', 'App\Http\Controllers\Admin\TestimonialController@store')->name('CreateTestimonial');
    Route::get('/show/{id}', 'App\Http\Controllers\Admin\TestimonialController@edit')->name('ShowTestimonial');
    Route::post('/edit/{id}', 'App\Http\Controllers\Admin\TestimonialController@update')->name('EditTestimonial');

});

//DETAILS
Route::group(['prefix' => '/admin/details'], function (){

    Route::get('/select' , 'App\Http\Controllers\Admin\DetailController@index')->name('SelectDetail');
    Route::get('/show', 'App\Http\Controllers\Admin\DetailController@edit')->name('ShowDetail');
    Route::post('/edit', 'App\Http\Controllers\Admin\DetailController@update')->name('EditDetail');
});

//MENUTYPES
Route::group(['prefix' => '/admin/menutypes'], function (){

    Route::get('/select' , 'App\Http\Controllers\Admin\MenuTypeController@index')->name('SelectMenuType');
    Route::get('/createForm' ,'App\Http\Controllers\Admin\MenuTypeController@create')->name('CreateFormMenuType');
    Route::post('/create' , 'App\Http\Controllers\Admin\MenuTypeController@store')->name('CreateMenuType');
    Route::get('/delete/{id}' , 'App\Http\Controllers\Admin\MenuTypeController@destroy')->name('DeleteMenuType');
    Route::get('/show/{id}' , 'App\Http\Controllers\Admin\MenuTypeController@edit')->name('ShowMenuType');
    Route::post('/edit/{id}', 'App\Http\Controllers\Admin\MenuTypeController@update')->name('EditMenuType');

});

//CHEFS
Route::group(['prefix' => '/admin/chefs'], function(){

    Route::get('/select', 'App\Http\Controllers\Admin\ChefController@index')->name('SelectChef');
    Route::get('/createForm' ,'App\Http\Controllers\Admin\ChefController@create')->name('CreateFormChef');
    Route::post('/create' , 'App\Http\Controllers\Admin\ChefController@store')->name('CreateChef');
    Route::get('/delete/{id}', 'App\Http\Controllers\Admin\ChefController@destroy')->name('DeleteChef');
    Route::get('/show/{id}', 'App\Http\Controllers\Admin\ChefController@edit')->name('ShowChef');
    Route::post('/edit/{id}', 'App\Http\Controllers\Admin\ChefController@update')->name('EditChef');

});

//EVENTS
Route::group(['prefix' => '/admin/events'],  function(){

    Route::get('/select' , 'App\Http\Controllers\Admin\EventController@index')->name('SelectEvent');
    Route::get('/createForm', 'App\Http\Controllers\Admin\EventController@create')->name('CreateFormEvent');
    Route::post('/create', 'App\Http\Controllers\Admin\EventController@store')->name('CreateEvent');
    Route::get('/show/{id}' ,'App\Http\Controllers\Admin\EventController@edit')->name('ShowEvent');
    Route::post('/edit/{id}', 'App\Http\Controllers\Admin\EventController@update')->name('EditEvent');
    Route::get('/delete/{id}' , 'App\Http\Controllers\Admin\EventController@destroy')->name('DeleteEvent');

});

//SPECIALS
Route::group(['prefix' => '/admin/specials'], function (){

    Route::get('/select' , 'App\Http\Controllers\Admin\SpecialController@index')->name('SelectSpecial');
    Route::get('/createForm' , 'App\Http\Controllers\Admin\SpecialController@create')->name('CreateFormSpecial');
    Route::post('/create' , 'App\Http\Controllers\Admin\SpecialController@store')->name('CreateSpecial');
    Route::get('/delete/{id}' , 'App\Http\Controllers\Admin\SpecialController@destroy')->name('DeleteSpecial');
    Route::get('/show/{id}' , 'App\Http\Controllers\Admin\SpecialController@edit')->name('ShowSpecial');
    Route::post('/edit/{id}' , 'App\Http\Controllers\Admin\SpecialController@update')->name('EditSpecial');

});

//GALLERIES
Route::group(['prefix' => '/admin/galleries'], function (){

    Route::get('/select' , 'App\Http\Controllers\Admin\GalleryController@index')->name('SelectGallery');
    Route::get('/createForm' , 'App\Http\Controllers\Admin\GalleryController@create')->name('CreateFormGallery');
    Route::post('/create', 'App\Http\Controllers\Admin\GalleryController@store')->name('CreateGallery');
    Route::get('/delete/{id}', 'App\Http\Controllers\Admin\GalleryController@destroy')->name('DeleteGallery');
    Route::get('/show/{id}', 'App\Http\Controllers\Admin\GalleryController@edit')->name('ShowGallery');
    Route::post('/edit/{id}' , 'App\Http\Controllers\Admin\GalleryController@update')->name('EditGallery');

});

//ABOUT
Route::group(['prefix'=> '/admin/about'], function (){

    Route::get('/select', 'App\Http\Controllers\Admin\AboutController@index')->name('SelectAbout');
    Route::get('/show' ,'App\Http\Controllers\Admin\AboutController@edit')->name('ShowAbout');
    Route::post('/edit', 'App\Http\Controllers\Admin\AboutController@update')->name('EditAbout');

});

//LOGATION
Route::group(['prefix' => '/admin/location'], function(){

    Route::get('/select', 'App\Http\Controllers\Admin\LocationController@index')->name('SelectLocation');
    Route::get('/show' , 'App\Http\Controllers\Admin\LocationController@edit')->name('ShowLocation');
    Route::post('/edit', 'App\Http\Controllers\Admin\LocationController@update')->name('EditLocation');

});

//VIDEO
Route::group(['prefix' => '/admin/video'], function (){

    Route::get('/select' , 'App\Http\Controllers\Admin\VideoController@index')->name('SelectVideo');
    Route::get('/show', 'App\Http\Controllers\Admin\VideoController@edit')->name('ShowVideo');
    Route::post('/edit', 'App\Http\Controllers\Admin\VideoController@update')->name('EditVideo');

});

//THE END ROUTES FOR ADMIN
});


