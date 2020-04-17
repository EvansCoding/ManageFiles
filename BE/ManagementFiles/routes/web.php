<?php

use Illuminate\Support\Facades\Route;


/**
 * Routing admin
 *
 */

$prefixAdmin = config("managefiles.url.prefixAdmin", "admin");

Route::group(['prefix' => $prefixAdmin], function () {
    Route::get('/', function () {
        return view('welcome');
    });

    /**
     * rounting File
     */
    $prefix = 'category';
    $controllerName  = 'category';
    Route::group(['prefix' => $prefix], function () use ($controllerName) {
        $controller = ucfirst($controllerName) . 'Controller@';

        Route::get('/', [
            'as' => $controllerName,
            'uses' => $controller . 'index'
        ]);
        Route::post('/',  [
            'as' => $controllerName . '.store',
            'uses' => $controller . 'store'
        ]);

        Route::post('/show', [
            'as' => $controllerName . '.show',
            'uses' => $controller . 'show'
        ]);

        Route::post('/delete', [
            'as' => $controllerName . '.delete',
            'uses' => $controller . 'delete'
        ]);
    });
    //-----------------------------------------
});
