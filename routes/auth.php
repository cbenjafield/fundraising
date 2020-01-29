<?php

/**
 * The user will have to be logged in to access these routes.
 */

Route::get('dashboard', 'DashboardController@index');
Route::get('logout', 'Auth\LoginController@logout');

Route::get('campaigns/{campaign}/donate', 'DonationController@donate');
Route::post('campaigns/{campaign}/donate', 'DonationController@paymentIntent');
Route::post('campaigns/{campaign}/complete-donation', 'DonationController@completePayment');
Route::resource('campaigns', 'CampaignController');