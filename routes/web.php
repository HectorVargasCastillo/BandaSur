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

Route::get('/', 'WelcomeController@index')->name('welcome');



/**
 * Register the typical authentication routes for an application.
 * Replacing: Auth::routes();
 */
Route::group(['namespace' => 'Auth'], function () {
    // Authentication Routes...
    Route::get('login', 'LoginController@showLoginForm')->name('login');
    Route::post('login', 'LoginController@login');
    Route::post('logout', 'LoginController@logout')->name('logout');

    // Registration Routes...
    if (config('adminlte.registration_open')) {
        Route::get('register', 'RegisterController@showRegistrationForm')->name('register');
        Route::post('register', 'RegisterController@register');
    }

    // Password Reset Routes...
    Route::get('password/reset', 'ForgotPasswordController@showLinkRequestForm')->name('password.request');
    Route::post('password/email', 'ForgotPasswordController@sendResetLinkEmail')->name('password.email');
    Route::get('password/reset/{token}', 'ResetPasswordController@showResetForm')->name('password.reset');
    Route::post('password/reset', 'ResetPasswordController@reset');

    if (config('adminlte.impersonate')) {
        /**
         * Impersonate User. Requires authentication.
         */
        Route::post('impersonate/{id}', 'ImpersonateController@impersonate')->name('impersonate');
        /**
         * Stop Impersonate. Requires authentication.
         */
        Route::get('impersonate/stop', 'ImpersonateController@stopImpersonate')->name('impersonate.stop');
    }
});

// Redirect to /dashboard
Route::get('/home', 'HomeController@index')->name('home');

/**
 * Requires authentication.
 */
Route::group(['middleware' => 'auth'], function () {
    /**
     * Dashboard. Common access.
     * // Matches The "/dashboard/*" URLs
     */
    Route::group(['prefix' => 'dashboard', 'namespace' => 'Dashboard', 'as' => 'dashboard::'], function () {
        /**
         * Dashboard Index
         * // Route named "dashboard::index"
         */
        Route::get('/', ['as' => 'index', 'uses' => 'IndexController@index']);

        /**
         * Profile
         * // Route named "dashboard::profile"
         */
        Route::get('profile', ['as' => 'profile', 'uses' => 'ProfileController@showProfile']);
        Route::post('profile', ['as' => 'profile.update', 'uses' => 'ProfileController@updateProfile']);
    });

    /**
     * // Matches The "/admin/*" URLs
     */
    Route::group(['prefix' => 'admin', 'namespace' => 'Admin', 'as' => 'admin::'], function () {
        /**
         * Admin Access
         */
        Route::group(['middleware' => 'admin'], function () {
            /**
             * Admin Index
             * // Route named "admin::index"
             */
            Route::get('/', ['as' => 'index', 'uses' => 'IndexController@index']);

            /**
             * Manage Users.
             * // Routes name "admin.users.*"
             */
            Route::resource('users', 'UsersController');
        });
    });

});


Route::resource('estilos', 'EstiloController');

Route::resource('estado_eventos', 'EstadoEventoController');

Route::resource('paises', 'PaisController');

Route::resource('ciudades', 'CiudadController');

Route::resource('instrumentos', 'InstrumentoController');

Route::resource('productoras', 'ProductoraController');

Route::resource('bandas', 'BandaController');

Route::resource('integrantes', 'IntegranteController');

Route::get('integrantes/integrantesxBanda/{id}', 'IntegranteController@integrantesxBanda')->name('integrantesxBanda');

Route::get('integrantes/creaintegranteBanda/{id}', 'IntegranteController@creaintegranteBanda')->name('creaintegranteBanda');

Route::resource('eventos', 'EventoController');

Route::resource('registro_donaciones', 'RegistroDonacionController');

Route::get('registro_donaciones/creaDonacion/{id}', 'RegistroDonacionController@creaDonacion')->name('creaDonacion');

Route::get('registro_donaciones/listaDonacion/{id}', 'RegistroDonacionController@listaDonacion')->name('listaDonacion');

Route::get('registro_donaciones/editaDonacion/{id}/{id_usuario}', 'RegistroDonacionController@editaDonacion')->name('editaDonacion');

Route::resource('registro_propuestas', 'RegistroPropuestaController');

Route::get('registro_propuestas/creaPropuesta/{id}', 'RegistroPropuestaController@creaPropuesta')->name('creaPropuesta');

Route::get('registro_propuestas/listaPropuesta/{id}', 'RegistroPropuestaController@listaPropuesta')->name('listaPropuesta');

Route::get('registro_propuestas/editaPropuesta/{id}/{id_usuario}', 'RegistroPropuestaController@editaPropuesta')->name('editaPropuesta');


