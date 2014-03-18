<?php


Route::get('/', function()
{
	return View::make('index');
});

Route::get('/', array(
	'as' => 'home',
	'uses' => 'HomeController@home'
));

Route::get('/user/{fullname}', array(
	'as' => 'profile-user',
	'uses' => 'ProfileController@user'
));


/*Authenticated Route Group*/
Route::group(array('before' => 'auth'), function() {

	Route::group(array('before' => 'csrf'), function() {
		Route::post('account/settings/change-password', array(
			'as' => 'account-password',
			'uses' => 'AccountController@postChangePassword'
		));
	});

	/*Settings Account (Get)*/
	Route::get('account/settings', array(
		'as' => 'account-settings',
		'uses' => 'AccountController@getSettings'
	));

	Route::get('account/settings/change-password', array(
		'as' => 'account-settings-password',
		'uses' => 'AccountController@getSettings'
	));

	/*Sign Out Account (Get)*/
	Route::get('account/sign-out', array(
		'as' => 'account-sign-out',
		'uses' => 'AccountController@getSignOut'
	));

});


/*UnAuthenticated Route Group*/
Route::group(array('before' => 'guest'), function() {

	Route::group(array('before' => 'csrf'), function() {

		/*Create Account (Post)*/
		Route::post('account/create', array(
			'as' => 'account-create',
			'uses' => 'AccountController@postCreate'
		));

		/*Sign In Account (Post)*/
		Route::post('account/sign-in', array(
			'as' => 'account-sign-in',
			'uses' => 'AccountController@postSignIn'
		));

		/*Forgot Password (Post)*/
		Route::post('account/forgot-password', array(
			'as' => 'account-forgot-password',
			'uses' => 'AccountController@postForgotPassword'
		));
	});

	Route::get('account/recover/{code}', array(
		'as' => 'account-recover',
		'uses' => 'AccountController@getRecover'
	));

	Route::get('account/sign-in', array(
		'as' => 'account-sign-in',
		'uses' => 'AccountController@getSignIn'
	));

	Route::get('account/create', array(
		'as' => 'account-create',
		'uses' => 'AccountController@getCreate'
	));

	Route::get('account/activate/{code}', array(
		'as' => 'account-activate',
		'uses' => 'AccountController@getActivate'
	));

	Route::get('account/forgot-password', array(
		'as' => 'account-forgot-password',
		'uses' => 'AccountController@getForgotPassword'
	));

});