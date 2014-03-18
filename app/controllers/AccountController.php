<?php

class AccountController extends BaseController {

	public function getSignIn() {
		return View::make('account.signin');
	}

	public function postSignIn() {
		$validator = Validator::make(Input::all(),
			array(
				'email' => 'required|email',
				'password' => 'required'
			)
		);

		if($validator->fails()) {
			return Redirect::route('account-sign-in')
				->withErrors($validator)
				->withInput();
		} else {

			$remember = (Input::has('remember')) ? true : false;

			$auth = Auth::attempt(array(
				'email' => Input::get('email'),
				'password' => Input::get('password'),
				'active' => 1
			), $remember);

			if($auth) {
				return Redirect::intended('/');
			} else {
				return Redirect::route('account-sign-in')
					->with('global', 'Email and passwords dont match, or account not activated');
			}
		}

		return Redirect::route('account-sign-in')
			->with('global', 'Email and passwords dont match, or account not activated');
	}

	public function getSettings() {
		return View::make('account.settings');
	}

	public function getSignOut() {
		Auth::logout();
		return Redirect::route('home')
			->with('global', 'You have successfully signed out!');
	}


	public function getCreate()
	{
		return View::make('account.create');
	}

	public function postCreate()
	{
		$validator = Validator::make(Input::all(),
			array(
				'fullname' => 'required|min:3',
				'email' => 'required|max:50|email|unique:users',
				'password' => 'required|min:6',
				'confirm_password' => 'required|same:password'
			)
		);

		if($validator->fails()) {
			return Redirect::route('account-create')
				->withErrors($validator)
				->withInput();
		} else {

			$fullname 	= Input::get('fullname');
			$email 		= Input::get('email');
			$password 	= Input::get('password');

			/*Generating activation code*/
			$code		= str_random(60);

			$user = User::create(array(
				'fullname' 	=> $fullname,
				'email'		=> $email,
				'password'	=> Hash::make($password),
				'code' 		=> $code,
				'active'	=> 0
			));

			if($user) {

				Mail::send('emails.auth.activate', array('link' => URL::route('account-activate', $code), 'fullname' => $fullname), function($message) use ($user){
					$message->to($user->email, $user->fullname)->subject('Activate your account');
				});

				return Redirect::route('home')
					->with('global', 'Your account has been created! We have sent you an email to activate your account');
			}

		}
	}

	public function getActivate($code) {
		$user = User::where('code','=', $code)->where('active', '=', 0);

		if($user->count()) {
			$user = $user->first();

			$user->active = 1;
			$user->code = '';

			if($user->save()) {
				return Redirect::route('home')
					->with('global', 'Activated! You can now sign-in');
			}
		}

		return Redirect::route('home')
			->with('global', 'We could not activate your account. Try again later');
	}


	public function postChangePassword() {
		$validator = Validator::make(Input::all(),
			array(
				'old_password' => 'required',
				'password' => 'required|min:6',
				'confirm_password' => 'required|same:password'
			)
		);

		if($validator->fails()) {
			return Redirect::route('account-settings-password')
				->withErrors($validator);
		} else {

			$user = User::find(Auth::user()->id);

			$old_password 		= Input::get('old_password');
			$password 			= Input::get('password');

			if(Hash::check($old_password, $user->getAuthPassword())) {
				$user->password = Hash::make($password);

				if($user->save()) {
					return Redirect::route('account-settings')
						->with('global', 'Your password has been changed');
				}
			} else {
				return Redirect::route('account-settings-password')
					->with('global', 'Your old password is incorrect');
			}

		}

		return Redirect::route('account-settings-password')
			->with('global', 'Your password couldn\'t be changed');
	}

	public function getForgotPassword() {
		return View::make('account.forgot');
	}

	public function postForgotPassword() {
		$validator = Validator::make(Input::all(),
			array(
				'email' => 'required|email'
			)
		);

		if($validator->fails()) {
			return Redirect::route('account-forgot-password')
				->withErrors($validator);
		} else {

			$user = User::where('email', '=', Input::get('email'));

			if($user->count()) {
				$user = $user->first();

				$code		= str_random(60);
				$password 	= str_random(10);

				$user->code = $code;
				$user->password_temp = Hash::make($password);

				if($user->save()) {
					Mail::send('emails.auth.forgot', array('link' => URL::route('account-recover', $code),'fullname' => $user->fullname, 'password' => $password), function($message) use ($user) {
						$message->to($user->email, $user->fullname)->subject('Your new password');
					});

					return Redirect::route('home')
						->with('global', 'Your new password has been sent to your email address');
				}
			}

		}

		return Redirect::route('account-forgot-password')
			->with('global', 'Could not request new password')
			->withInput();
	}

	public function getRecover($code) {
		$user = User::where('code', '=', $code)->where('password_temp', '!=', '');

		if($user->count()) {
			$user = $user->first();

			$user->password = $user->password_temp;
			$user->password_temp = '';
			$user->code = '';

			if($user->save()) {
				return Redirect::route('home')
				->with('global', 'Your account has been recovered, and you can sign in with your new password');
			}

			return Redirect::route('home')
				->with('global', 'Could not recover you account');

		}
	}
}