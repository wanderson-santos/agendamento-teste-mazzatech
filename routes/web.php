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

Auth::routes();

Route::group(['middleware' => 'auth'], function(){
    Route::get('/', 'ScheduleController@index');

    Route::get('/perfil/alterar-senha', 'PasswordController@reset');
    Route::post('/perfil/alterar-senha', 'PasswordController@resetPost');
    
    Route::group(['prefix' => 'medico'], function(){
        Route::get('', 'DoctorController@index');
        Route::get('{doctor}/detalhes', 'DoctorController@details');
        Route::get('cadastrar', 'DoctorController@create');
        Route::post('cadastrar', 'DoctorController@store');
        Route::get('{doctor}/editar', 'DoctorController@edit');
        Route::post('{doctor}/editar', 'DoctorController@update');
        Route::get('{doctor}/delete', 'DoctorController@delete');
        Route::post('{doctor}/delete', 'DoctorController@destroy');
    });

    Route::group(['prefix' => 'paciente'], function(){
        Route::get('', 'PatientController@index');
        Route::get('{patient}/detalhes', 'PatientController@details');
        Route::get('cadastrar', 'PatientController@create');
        Route::post('cadastrar', 'PatientController@store');
        Route::get('{patient}/editar', 'PatientController@edit');
        Route::post('{patient}/editar', 'PatientController@update');
        Route::get('{patient}/delete', 'PatientController@delete');
        Route::post('{patient}/delete', 'PatientController@destroy');
    });

    Route::group(['prefix' => 'agendamento'], function(){
        Route::get('', 'ScheduleController@index');
        Route::get('{schedule}/detalhes', 'ScheduleController@details');
        Route::get('cadastrar', 'ScheduleController@create');
        Route::post('cadastrar', 'ScheduleController@store');
        Route::get('{schedule}/editar', 'ScheduleController@edit');
        Route::post('{schedule}/editar', 'ScheduleController@update');
        Route::get('{schedule}/delete', 'ScheduleController@delete');
        Route::post('{schedule}/delete', 'ScheduleController@destroy');
    });

    Route::group(['prefix' => 'usuarios'], function(){
        Route::get('', 'UsersController@index');
        Route::get('{user}/detalhes', 'UsersController@details');
        Route::get('cadastrar', 'UsersController@create');
        Route::post('cadastrar', 'UsersController@store');
        Route::get('{user}/editar', 'UsersController@edit');
        Route::post('{user}/editar', 'UsersController@update');
        Route::get('{user}/delete', 'UsersController@delete');
        Route::post('{user}/delete', 'UsersController@destroy');
    });
});

Route::group(['prefix' => '/api/v1', 'namespace' => 'Api'], function(){
    Route::group(['prefix' => 'doctor'], function(){
        Route::get('', 'DoctorController@index');
        Route::get('{doctor}', 'DoctorController@show');
    });
});