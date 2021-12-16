<?php
// Route::redirect('/', 'admin/home');
Route::get('/', 'Auth\LoginController@ifLogin'); // Dashboard

Auth::routes(['register' => false]);

// Change Password Routes...
Route::get('change_password', 'Auth\ChangePasswordController@showChangePasswordForm')->name('auth.change_password');
Route::patch('change_password', 'Auth\ChangePasswordController@changePassword')->name('auth.change_password');

Route::group(['middleware' => ['auth'], 'prefix' => 'admin', 'as' => 'admin.'], function () {
    Route::get('/home', 'HomeController@index')->name('home');
    Route::resource('permissions', 'Admin\PermissionsController');
    Route::delete('permissions_mass_destroy', 'Admin\PermissionsController@massDestroy')->name('permissions.mass_destroy');
    Route::resource('roles', 'Admin\RolesController');
    Route::delete('roles_mass_destroy', 'Admin\RolesController@massDestroy')->name('roles.mass_destroy');
    Route::resource('users', 'Admin\UsersController');
    Route::delete('users_mass_destroy', 'Admin\UsersController@massDestroy')->name('users.mass_destroy');
});

Route::group(['middleware' => ['auth'], 'prefix' => 'user', 'as' => 'user.'], function () {
    Route::get('/home', 'User\dashboardController@index')->name('index'); // Dashboard

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
        // Destination

    // Biaya Perbaikan Unit
    Route::resource('/bpu', 'User\rekap\biayaPerbaikanUnitController');
    Route::resource('/pb', 'User\rekap\pemakaianBanController');
    Route::resource('/pu', 'User\rekap\pendapatanUnitController');
    Route::resource('/bbm', 'User\rekap\pengeluaranBBMController');
    Route::resource('/pembayaran', 'User\rekap\pembayaranController');
    Route::resource('/resume', 'User\rekap\resumeSPKController');
});

// Route::get('/', function () {
//     return view('auth.loginauth');
// });
