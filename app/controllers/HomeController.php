<?php

class HomeController extends BaseController {


	public function home() {

		/*Mail::send('emails.auth.test', array('name'=> 'Team'), function($message) {
			$message->to('dev.ryder88@gmail.com', 'Devanand')->subject('Test email');
		});*/

		return View::make('pages.home');
	}

}