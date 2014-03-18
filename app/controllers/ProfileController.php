<?php

class ProfileController extends BaseController {

	public function user($fullname) {

		$user = User::where('fullname', '=', $fullname);

		if($user->count()) {

			$user = $user->first();

			return View::make('profile.user')
				->with('user', $user);
		} 
		
		return App::abort(404);
	}
}