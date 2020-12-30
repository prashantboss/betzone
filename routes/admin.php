<?php

    Route::GET('/home', 'AdminController@index')->name('admin.home');
    // Login and Logout
    Route::GET('/', 'LoginController@showLoginForm')->name('admin.login');
    Route::POST('/', 'LoginController@login');
    Route::POST('/logout', 'LoginController@logout')->name('admin.logout');

    // Password Resets
    Route::POST('/password/email', 'ForgotPasswordController@sendResetLinkEmail')->name('admin.password.email');
    Route::GET('/password/reset', 'ForgotPasswordController@showLinkRequestForm')->name('admin.password.request');
    Route::POST('/password/reset', 'ResetPasswordController@reset');
    Route::GET('/password/reset/{token}', 'ResetPasswordController@showResetForm')->name('admin.password.reset');
    Route::GET('/password/change', 'AdminController@showChangePasswordForm')->name('admin.password.change');
    Route::POST('/password/change', 'AdminController@changePassword');

    // Register Admins
    Route::get('/register', 'RegisterController@showRegistrationForm')->name('admin.register');
    Route::post('/register', 'RegisterController@register');
    Route::get('/{admin}/edit', 'RegisterController@edit')->name('admin.edit');
    Route::delete('/{admin}', 'RegisterController@destroy')->name('admin.delete');
    Route::patch('/{admin}', 'RegisterController@update')->name('admin.update');

    // Admin Lists
    Route::get('/show', 'AdminController@show')->name('admin.show');
    Route::get('/me', 'AdminController@me')->name('admin.me');

    // Admin Roles
    Route::post('/{admin}/role/{role}', 'AdminRoleController@attach')->name('admin.attach.roles');
    Route::delete('/{admin}/role/{role}', 'AdminRoleController@detach');

    // Roles
    Route::get('/roles', 'RoleController@index')->name('admin.roles');
    Route::get('/role/create', 'RoleController@create')->name('admin.role.create');
    Route::post('/role/store', 'RoleController@store')->name('admin.role.store');
    Route::delete('/role/{role}', 'RoleController@destroy')->name('admin.role.delete');
    Route::get('/role/{role}/edit', 'RoleController@edit')->name('admin.role.edit');
    Route::patch('/role/{role}', 'RoleController@update')->name('admin.role.update');

    // active status
    Route::post('activation/{admin}', 'ActivationController@activate')->name('admin.activation');
    Route::delete('activation/{admin}', 'ActivationController@deactivate');
    Route::resource('permission', 'PermissionController');

    Route::fallback(function () {
        return abort(404);
    });
	
	//New Routes
	// Route::get('moderator', function(){
	// 	return "Check Moderator";
	// })->middleware('role:moderator');
	
	// Route::get('manager', function(){
	// 	return "Check Manager";
    // })->middleware('role:manager');
    
/* * ******  SiteSetting Start ********** */
    Route::get('/edit/site/setting', '\App\Http\Controllers\Admin\SiteSettingController@editsiteSetting')->name('admin.edit.site.setting')->middleware('role:super');
    Route::put('/update/site/setting', '\App\Http\Controllers\Admin\SiteSettingController@updatesiteSetting')->name('admin.update.site.setting')->middleware('role:super');
/* * ****** End SiteSetting ********** */

/* * ****** Player Crud Start ********** */
    Route::get('/player/index','\App\Http\Controllers\Admin\PlayersController@index')->name('admin.player.index')->middleware('role:super');
    Route::get('/player/edit/{id}','\App\Http\Controllers\Admin\PlayersController@edit')->name('admin.player.edit')->middleware('role:super');
    Route::get('/player/update','\App\Http\Controllers\Admin\PlayersController@update')->name('admin.player.update')->middleware('role:super');
    Route::get('/player/delete','\App\Http\Controllers\Admin\PlayersController@destroy')->name('admin.player.delete')->middleware('role:super');
    Route::get('/player/reset_pass/{id}','\App\Http\Controllers\Admin\PlayersController@forgot_pass')->name('admin.player.forgot_pass')->middleware('role:super');
    Route::get('/player/reset','\App\Http\Controllers\Admin\PlayersController@reset')->name('admin.player.reset')->middleware('role:super');
    /* * ****** Player Crud End ********** */

    // Static
    Route::get('/game_rate','\App\Http\Controllers\Admin\AStaticController@admin_game_rate_static')->name('admin.game_rate')->middleware('role:super');
    Route::get('/game_rate_update','\App\Http\Controllers\Admin\AStaticController@admin_game_rate_static_update')->name('admin.game_rate_update')->middleware('role:super');
    
    Route::get('/game_timing','\App\Http\Controllers\Admin\AStaticController@admin_game_timing_static')->name('admin.game_timing')->middleware('role:super');
    Route::get('/game_timing_update','\App\Http\Controllers\Admin\AStaticController@admin_game_timing_static_update')->name('admin.game_timing_update')->middleware('role:super');

    Route::get('/notice','\App\Http\Controllers\Admin\AStaticController@admin_notice_static')->name('admin.notice')->middleware('role:super');
    Route::get('/notice_update','\App\Http\Controllers\Admin\AStaticController@admin_notice_static_update')->name('admin.notice_update')->middleware('role:super');

    Route::get('/how_to_play','\App\Http\Controllers\Admin\AStaticController@how_to_play_static')->name('admin.how_to_play')->middleware('role:super');
    Route::get('/how_to_play_update','\App\Http\Controllers\Admin\AStaticController@admin_how_to_play_static_update')->name('admin.how_to_play_update')->middleware('role:super');

    //Transactions
    Route::get('/rest_trnxn','\App\Http\Controllers\Admin\TransactionController@all_rest_traxn')->name('admin.rest_trnxn')->middleware('role:super');
    Route::get('/half_sangam_traxn','\App\Http\Controllers\Admin\TransactionController@half_sangam_traxn')->name('admin.half_sangam_traxn')->middleware('role:super');
    Route::get('/full_sangam_traxn','\App\Http\Controllers\Admin\TransactionController@full_sangam_traxn')->name('admin.full_sangam_traxn')->middleware('role:super');

    //Live Result
    Route::get('/live_reslt/{id}','\App\Http\Controllers\Admin\TransactionController@live_result')->name('admin.live_result')->middleware('role:super');
    Route::post('/update_live_result','\App\Http\Controllers\Admin\TransactionController@update_live_result')->name('admin.update_live_result')->middleware('role:super');

    //Holiday
    Route::get('/holiday/{id}','\App\Http\Controllers\Admin\TransactionController@holiday')->name('admin.holiday')->middleware('role:super');
    Route::post('/holiday/update','\App\Http\Controllers\Admin\TransactionController@holiday_update')->name('admin.holiday_update')->middleware('role:super');