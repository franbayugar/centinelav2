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

/* Ex ruta para raiz /
Route::get('/', function () {
    return view('welcome');
});*/

Route::get('/', function () {
    return view('auth.login');
});

Auth::routes();

Route::get(
    'register',
    '\App\Http\Controllers\Auth\RegisterController@redirectLogin'
)->name('register');

Route::get(
    'password/reset',
    '\App\Http\Controllers\Auth\RegisterController@redirectLogin'
)->name('register');

/* -- Modulo Logins -- */
/* -- Grupo de rutas para panel de administración con proteccion del middleware -- */

Route::group(['prefix' => 'admin', 'middleware' => 'auth'], function () {
    // Route::get('/home', 'HomeController@index')->name('home');
    Route::get('/dashboard', 'Panel\DashboardController@index')->name(
        'dashboard'
    );

    // Rutas para modulo de profiles
    Route::resource('profiles', 'Panel\ProfilesController');

    /* Ruta para cambiar contraseña */
    Route::put('profiles/changepass/{pass}', [
        'uses' => 'Panel\ProfilesController@changePassword',
        'as' => 'profiles.changepassword',
    ]);

    // Rutas para modulo de orders
    Route::resource('orders', 'Panel\OrdersController');

    Route::group(['middleware' => 'admin'], function () {
        // Rutas para modulo de mails
        Route::resource('mails', 'Panel\MailsController');

        // Rutas para modulo de machines
        Route::resource('machines', 'Panel\MachinesController');

        /* Ruta que setea la imagen en null (Así está por defecto) */
        Route::get('machines/withoutimage/{id}', [
            'uses' => 'Panel\MachinesController@withoutImage',
            'as' => 'machines.withoutimage',
        ]);

        // Rutas para modulo de events
        Route::resource('events', 'Panel\EventsController');

        // Rutas para modulo de routers
        Route::resource('routers', 'Panel\RoutersController');

        // Rutas para modulo de viatics
        Route::resource('viatics', 'Panel\ViaticsController');
        //Ruta bandeja de entrada

        Route::get('/workassignments/bentrada', [
            'uses' => 'Panel\WorkAssignmentsController@bentrada',
            'as' => 'workassignments.bentrada',
        ]);

        Route::get('/workassignments/terminada', [
            'uses' => 'Panel\WorkAssignmentsController@terminada',
            'as' => 'workassignments.terminada',
        ]);

        Route::get('/workassignments/sinasignar', [
            'uses' => 'Panel\WorkAssignmentsController@sinasignar',
            'as' => 'workassignments.sinasignar',
        ]);

        Route::get('workassignments/autoassing/{id}', [
            'uses' => 'Panel\WorkAssignmentsController@autoassing',
            'as' => 'workassignments.autoassing',
        ]);

        // Rutas para modulo de workassignments
        Route::resource('workassignments', 'Panel\WorkAssignmentsController');

        //cambiar a resuelto en llamados
        Route::get('calls/updateNotified/{id}', [
            'uses' => 'Panel\CallsController@updateNotified',
            'as' => 'calls.updateNotified',
        ]);

        //Rutas para llamados
        Route::resource('calls', 'Panel\CallsController');

        // Rutas para modulo de products
        Route::resource('products', 'Panel\ProductsController');

        /* Ruta que setea la imagen en null (Así está por defecto) */
        Route::get('products/withoutimage/{id}', [
            'uses' => 'Panel\ProductsController@withoutImage',
            'as' => 'products.withoutimage',
        ]);

        // Ruta para modulo inputproducts
        Route::resource('inputproducts', 'Panel\InputProductsController');

        // Ruta para modulo outputproducts
        Route::get('outputproducts/totaloutputs', [
            'uses' => 'Panel\OutputProductsController@totaloutputs',
            'as' => 'outputproducts.totaloutputs',
        ]);

        Route::resource('outputproducts', 'Panel\OutputProductsController');

        Route::group(['prefix' => 'userorders'], function () {
            // Ruta para mostrar los pedidos cancelados
            Route::get('reservedorders', [
                'uses' => 'Panel\OutputProductsController@reservedorders',
                'as' => 'reservedorders',
            ]);

            // Ruta para mostrar los pedidos cancelados
            Route::get('canceledorders', [
                'uses' => 'Panel\OutputProductsController@canceledOrders',
                'as' => 'canceledorders',
            ]);
        });

        Route::group(['prefix' => 'parameters'], function () {
            // Rutas para modulo de actions
            Route::resource('actions', 'Panel\ActionsController');

            // Rutas para modulo areas
            Route::resource('areas', 'Panel\AreasController');

            // Rutas para modulo de estados de reparación
            Route::resource('statusrepairs', 'Panel\StatusRepairsController');

            // Ruta para modulo statusoutputs
            Route::resource('statusoutputs', 'Panel\StatusOutputsController');

            // Rutas para modulo de machinetypes
            Route::resource('machinetypes', 'Panel\MachineTypesController');

            // Rutas para modulo usuarios
            Route::resource('users', 'Panel\UsersController');

            /* Ruta para cambiar contraseña */
            Route::put('users/changepass/{pass}', [
                'uses' => 'Panel\UsersController@changePassword',
                'as' => 'users.changepassword',
            ]);
        });

        // Ruta para confirmar los pedidos del usuario
        Route::get('confirmorder/{outputproduct}', [
            'uses' => 'Panel\OutputProductsController@confirmOrder',
            'as' => 'outputproducts.confirmorder',
        ]);

        // Ruta para confirmar los pedidos del usuario
        Route::get('cancelorder/{outputproduct}', [
            'uses' => 'Panel\OutputProductsController@cancelOrder',
            'as' => 'outputproducts.cancelorder',
        ]);
    });
});
