<?php

Route::group(['namespace' => 'Player'], function() {
    Route::get('/', 'HomeController@index')->name('player.dashboard');

    // Login
    Route::get('login', 'Auth\LoginController@showLoginForm')->name('player.login');
    Route::post('login', 'Auth\LoginController@login');
    Route::post('logout', 'Auth\LoginController@logout')->name('player.logout');

    // Register
    Route::get('register', 'Auth\RegisterController@showRegistrationForm')->name('player.register');
    Route::post('register', 'Auth\RegisterController@register');

    // Passwords
    Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('player.password.email');
    Route::post('password/reset', 'Auth\ResetPasswordController@reset');
    Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('player.password.request');
    Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('player.password.reset');

    // Must verify email
    Route::get('email/resend','Auth\VerificationController@resend')->name('player.verification.resend');
    Route::get('email/verify','Auth\VerificationController@show')->name('player.verification.notice');
    Route::get('email/verify/{id}/{hash}','Auth\VerificationController@verify')->name('player.verification.verify');

    //Game
    Route::get('game/list/market/{id}/{name}','GamesController@list_market')->name('player.list.market');
    Route::get('game/market/number/{game}/{market}/{open_close?}','GamesController@market_number')->name('player.market.number');
    Route::post('game/market/create','GamesController@create_game_market')->name('player.create.game.market')->middleware(CheckWallet::class);

    //Dashboard
    Route::get('dashboard','dashboardController@index')->name('player.dashboard');

    //Static
    Route::get('game_rate','StaticController@game_rate_static')->name('player.game_rate_static');
    Route::get('how_to_play','StaticController@how_to_play_static')->name('player.how_to_play_static');
    Route::get('game_timing','StaticController@game_timing_static')->name('player.game_timing_static');
    Route::get('notice','StaticController@notice_static')->name('player.notice_static');

    //Balance Enquiry
    Route::get('game/balance/enquiry','GamesController@balance_enquiry')->name('player.balance.enquiry');
    Route::get('game/game_ledger','GamesController@game_ledger')->name('player.game_ledger');

    Route::get('profile_show','GamesController@profile')->name('player.profile');
    Route::get('profile_update','GamesController@profile_update')->name('player.update');
});