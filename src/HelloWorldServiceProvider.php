<?php

namespace Hello\World;

use Illuminate\Support\ServiceProvider;
use Illuminate\Routing\Router;

class HelloWorldServiceProvider extends ServiceProvider {

	/**
	 * HelloWorld provides the HelloWorldServiceProvider for ease-of-use.
	 *
	 * @var array
	 */
	protected $defer = false;
	
//	protected $providers = [
//		'Hello\World\HelloWorldServiceProvider'
//	];

	/**
	 * Bootstrap the application services.
	 *
	 * @return void
	 */
	public function boot() {
		$this->setupRoutes($this->app->router);
	}
	
	public function setupRoutes(Router $router) {
		$router->group(['namespace' => 'Hello\World'], function($router) {
			require __DIR__ . '/routes.php';
		});
	}

	/**
	 * Register the application services.
	 *
	 * @return void
	 *
	 */
	public function register() {
		
//		App::register('Hello\World\HelloWorldServiceProvider');
//		$this->app->register('Hello\World\HelloWorldServiceProvider');

//		$provider = new Hello\World\HelloWorldServiceProvider;
//		App::register($provider);

		
		// Routes
		include __DIR__.'/routes.php';
		
		return $this->app->make('Hello\World\HelloWorldController');
		

	}

}
