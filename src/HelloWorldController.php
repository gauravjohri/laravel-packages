<?php

namespace Hello\World;

use App\Http\Controllers\Controller;

class HelloWorldController extends Controller {

	public function index() {
		// 1.0.25
		echo 'HelloWorldController::index <br/>';
	}
	
	public function say($say = '') {
		echo $say, '<br/>';
	}

}