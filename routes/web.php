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
    Route::resource('/vehicle', 'User\reference\armadaController');
    Route::resource('/driver', 'User\reference\driverController');
    Route::resource('/customer', 'User\reference\customerController');
    Route::resource('/destination', 'User\reference\tujuanController');

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
