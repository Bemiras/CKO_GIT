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

Route::get('/home', 'HomeController@index');

Route::get('/student', 'StudentController@index');

Route::get('/worker', 'WorkerController@index');

Route::get('/admin', 'AdminController@index');

Route::get('/about', 'AboutController@index');

Route::get('/card', 'CardController@index');
Route::post('/card/store', 'CardController@store');

Route::get('/message', 'MessageController@index');
Route::get('/messageSend', 'MessageController@wyslane');
Route::get('/message/newMessage/{id}', 'MessageController@newMessage');
Route::post('/message/sendMessage/{id}', 'MessageController@sendMessage');

Route::get('/pendingapplication', 'PendingapplicationController@index');
Route::get('/pendingapplication/updateYesDeanery/{id}', 'PendingapplicationController@updateYesDeanery');
Route::get('/pendingapplication/updateNoDeanery/{id}', 'PendingapplicationController@updateNoDeanery');
Route::get('/pendingapplication/updateYesLiblary/{id}', 'PendingapplicationController@updateYesLiblary');
Route::get('/pendingapplication/updateNoLiblary/{id}', 'PendingapplicationController@updateNoLiblary');
Route::get('/pendingapplication/updateYesDormitory/{id}', 'PendingapplicationController@updateYesDormitory');
Route::get('/pendingapplication/updateNoDormitory/{id}', 'PendingapplicationController@updateNoDormitory');
Route::get('/pendingapplication/updateYesCard/{id}', 'PendingapplicationController@updateYesCard');
Route::get('/pendingapplication/updateNoCard/{id}', 'PendingapplicationController@updateNoCard');
Route::get('/pendingapplication/updateYesPromoter/{id}', 'PendingapplicationController@updateYesPromoter');
Route::get('/pendingapplication/updateNoPromoter/{id}', 'PendingapplicationController@updateNoPromoter');


Route::get('/consideredapplication', 'ConsideredapplicationController@index');
Route::get('/consideredapplication/updateResetDeanery/{id}', 'ConsideredapplicationController@updateResetDeanery');
Route::get('/consideredapplication/updateResetLiblary/{id}', 'ConsideredapplicationController@updateResetLiblary');
Route::get('/consideredapplication/updateResetDormitory/{id}', 'ConsideredapplicationController@updateResetDormitory');
Route::get('/consideredapplication/updateResetPromoter/{id}', 'ConsideredapplicationController@updateResetPromoter');;


Route::get('/departmentoffer', 'DepartmentofferController@index');
Route::get('/departmentoffer/create', 'DepartmentofferController@create');
Route::post('/departmentoffer/store', 'DepartmentofferController@store');
Route::get('/departmentoffer/destroy/{id}', 'DepartmentofferController@destroy');
Route::post('/departmentoffer/update/{id}','DepartmentofferController@update');
Route::get('/departmentoffer/edit/{id}', 'DepartmentofferController@edit');


Route::get('/directionoffer', 'DirectionofferController@index');
Route::get('/directionoffer/create', 'DirectionofferController@create');
Route::post('/directionoffer/store', 'DirectionofferController@store');
Route::get('/directionoffer/destroy/{id}', 'DirectionofferController@destroy');
Route::post('/directionoffer/update/{id}','DirectionofferController@update');
Route::get('/directionoffer/edit/{id}', 'DirectionofferController@edit');

Route::get('/userrole', 'UserroleController@index');
Route::get('/userrole/edit/{id}', 'UserroleController@edit');
Route::get('/userrole/registrations', 'UserroleController@showRegistrations');
Route::post('/userrole/regiserEmployee', 'UserroleController@regiserEmployee');
Route::post('/userrole/update/{id}','UserroleController@update');

Route::get('/dataapplication', 'DataapplicationController@index');

Route::get('/userlist', 'UserlistController@index');

Route::get('/news', 'NewsController@index');

Route::get('/commissions', 'CommissionsController@index');
Route::get('/commissions/create', 'CommissionsController@create');
Route::post('/commissions/store', 'CommissionsController@store');
Route::get('/commissions/destroy/{id}', 'CommissionsController@destroy');
Route::post('/commissions/update/{id}','CommissionsController@update');
Route::get('/commissions/edit/{id}', 'CommissionsController@edit');

Route::get('/dataChangeRequests', 'dataChangeRequestsController@index');
Route::post('/sendApplicationForChangingData', 'dataChangeRequestsController@sendApplicationForChangingData');

Route::get('/applicationToAccept', 'ApplicationToAccept@index');
Route::post('/acceptEditChange/{id?}', 'ApplicationToAccept@acceptEditChange');
Route::post('/dismissEditChange/{id}', 'ApplicationToAccept@dismissEditChange');

Auth::routes();

//Route::get('/home', 'HomeController@index')->name('home');
