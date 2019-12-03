<?php

use Illuminate\Http\Request;


Route::group(['middleware' => ['jwt.verify']], function () {
    Route::apiResource('empresas', 'EmpresaController');
});

Route::apiResource('vagas', 'VagaController');
Route::post('login', 'AuthController@login');
Route::post('register', 'AuthController@register');
