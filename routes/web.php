<?php

/** @var \Laravel\Lumen\Routing\Router $router */

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/

// API route group
$router->group(['prefix' => 'api'], function () use ($router) {
    $router->group(['prefix' => 'v1/user'], function () use ($router) {
        $router->post('register', 'api\v1\RegisterController@index');
        $router->post('sign-in', 'api\v1\LoginController@index');

        $router->post('/password/reset-request', 'api\v1\RequestPasswordController@resetPassword');
        $router->post('/password/reset', [ 'as' => 'password.reset', 'uses' => 'api\v1\ResetPasswordController@reset' ]);


        $router->group(['middleware' => 'auth:api'], function () use ($router) {
            $router->get('/user/companies', 'api\v1\CompanyController@getUserCompanies' );
            $router->post('/user/companies', 'api\v1\CompanyController@createUserCompany' );
        });

    });
});
