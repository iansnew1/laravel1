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

Route::resource(
    'users',
    'UserController',
    ['except' => ['create', 'edit']]
);

Route::resource(
	'members',
	'MemberController',
	['only' => ['show']]
);

Route::resource(
	'alphanumerics',
	'AlphaNumericController',
	['only' => ['show']]
);
