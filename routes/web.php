<?php
// Route::redirect('/', 'admin/home');
Route::get('/', 'Auth\LoginController@ifLogin'); // Dashboard

Auth::routes(['register' => false]);

// Change Password Routes...
Route::get('change_password', 'Auth\ChangePasswordController@showChangePasswordForm')->name('auth.change_password');
Route::patch('change_password', 'Auth\ChangePasswordController@changePassword')->name('auth.change_password');

// ROLE ADMIN ---------------
Route::group(['middleware' => ['auth'], 'prefix' => 'admin', 'as' => 'admin.'], function () {
    Route::get('/home', 'HomeController@index')->name('home');
    Route::resource('permissions', 'Admin\PermissionsController');
    Route::delete('permissions_mass_destroy', 'Admin\PermissionsController@massDestroy')->name('permissions.mass_destroy');
    Route::resource('roles', 'Admin\RolesController');
    Route::delete('roles_mass_destroy', 'Admin\RolesController@massDestroy')->name('roles.mass_destroy');
    Route::resource('users', 'Admin\UsersController');
    Route::delete('users_mass_destroy', 'Admin\UsersController@massDestroy')->name('users.mass_destroy');
});

// ROLE USER ---------------
Route::group(['middleware' => ['auth'], 'prefix' => 'user', 'as' => 'user.'], function () {
    Route::get('/home', 'User\dashboardController@index')->name('index'); // Dashboard

    // HELP DESK
    Route::get('/faqs', function () {
        return view('pages.helpdesk.help');
    });

    // Reference
        // Vehicle
        Route::get('/vehicle/hapus/{id}', 'User\reference\vehicleController@hapus')->name('vehicle.hapus');
        Route::post('/vehicle/ubah/{id}', 'User\reference\vehicleController@ubah')->name('vehicle.ubah');
        Route::get('/vehicle/getubah/{id}', 'User\reference\vehicleController@getubah')->name('vehicle.getubah');
        Route::post('/vehicle/tambah', 'User\reference\vehicleController@tambah')->name('vehicle.tambah');
        Route::get('/vehicle/table', 'User\reference\vehicleController@table')->name('vehicle.table');
        Route::get('/vehicle', 'User\reference\vehicleController@index')->name('vehicle.index');
        // Driver
        Route::get('/driver/hapus/{id}', 'User\reference\driverController@hapus')->name('driver.hapus');
        Route::post('/driver/ubah/{id}', 'User\reference\driverController@ubah')->name('driver.ubah');
        Route::get('/driver/getubah/{id}', 'User\reference\driverController@getubah')->name('driver.getubah');
        Route::post('/driver/tambah', 'User\reference\driverController@tambah')->name('driver.tambah');
        Route::get('/driver/table', 'User\reference\driverController@table')->name('driver.table');
        Route::get('/driver', 'User\reference\driverController@index')->name('driver.index');
        // Customer
        Route::get('/customer/hapus/{id}', 'User\reference\customerController@hapus')->name('customer.hapus');
        Route::post('/customer/ubah/{id}', 'User\reference\customerController@ubah')->name('customer.ubah');
        Route::get('/customer/getubah/{id}', 'User\reference\customerController@getubah')->name('customer.getubah');
        Route::post('/customer/tambah', 'User\reference\customerController@tambah')->name('customer.tambah');
        Route::get('/customer/table', 'User\reference\customerController@table')->name('customer.table');
        Route::get('/customer', 'User\reference\customerController@index')->name('customer.index');
        // Destination
        Route::get('/destination/hapus/{id}', 'User\reference\destinationController@hapus')->name('destination.hapus');
        Route::post('/destination/ubah/{id}', 'User\reference\destinationController@ubah')->name('destination.ubah');
        Route::get('/destination/getubah/{id}', 'User\reference\destinationController@getubah')->name('destination.getubah');
        Route::post('/destination/tambah', 'User\reference\destinationController@tambah')->name('destination.tambah');
        Route::get('/destination/table', 'User\reference\destinationController@table')->name('destination.table');
        Route::get('/destination', 'User\reference\destinationController@index')->name('destination.index');

    // Daily
        // Biaya Perbaikan Unit
        Route::get('/bpu/hapus/{id}', 'User\rekap\bpuController@hapus')->name('bpu.hapus');
        Route::post('/bpu/ubah/{id}', 'User\rekap\bpuController@ubah')->name('bpu.ubah');
        Route::get('/bpu/getubah/{id}', 'User\rekap\bpuController@getubah')->name('bpu.getubah');
        Route::post('/bpu/tambah', 'User\rekap\bpuController@tambah')->name('bpu.tambah');
        Route::get('/bpu/table', 'User\rekap\bpuController@table')->name('bpu.table');
        Route::get('/bpu', 'User\rekap\bpuController@index')->name('bpu.index');
        // Pendapatan Unit
        Route::get('/pu/hapus/{id}', 'User\rekap\puController@hapus')->name('pu.hapus');
        Route::post('/pu/ubah/{id}', 'User\rekap\puController@ubah')->name('pu.ubah');
        Route::get('/pu/getubah/{id}', 'User\rekap\puController@getubah')->name('pu.getubah');
        Route::post('/pu/tambah', 'User\rekap\puController@tambah')->name('pu.tambah');
        Route::get('/pu/table', 'User\rekap\puController@table')->name('pu.table');
        Route::get('/pu', 'User\rekap\puController@index')->name('pu.index');
        // Pemakaian Ban
            // REF
            Route::get('/pb/ban/hapus/{id}', 'User\rekap\refpbController@hapus')->name('ban.hapus');
            Route::post('/pb/ban/ubah/{id}', 'User\rekap\refpbController@ubah')->name('ban.ubah');
            Route::get('/pb/ban/getubah/{id}', 'User\rekap\refpbController@getubah')->name('ban.getubah');
            Route::post('/pb/ban/tambah', 'User\rekap\refpbController@tambah')->name('ban.tambah');
            Route::get('/pb/ban/table', 'User\rekap\refpbController@table')->name('ban.table');
            Route::get('/pb/ban', 'User\rekap\refpbController@index')->name('ban.index');
            // REKAP
            Route::get('/pb/hapus/{id}', 'User\rekap\pbController@hapus')->name('pb.hapus');
            Route::post('/pb/ubah/{id}', 'User\rekap\pbController@ubah')->name('pb.ubah');
            Route::get('/pb/getban/{id}', 'User\rekap\pbController@getban')->name('pb.getban');
            Route::get('/pb/getubah/{id}', 'User\rekap\pbController@getubah')->name('pb.getubah');
            Route::post('/pb/tambah', 'User\rekap\pbController@tambah')->name('pb.tambah');
            Route::get('/pb/table', 'User\rekap\pbController@table')->name('pb.table');
            Route::get('/pb', 'User\rekap\pbController@index')->name('pb.index');
});

// Route::get('/', function () {
//     return view('auth.loginauth');
// });
