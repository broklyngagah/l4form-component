<?php namespace Pieter\FormComponent;

use Illuminate\Support\ServiceProvider;
use Pieter\FormComponent\CDate\DateComponent;

class FormComponentServiceProvider extends ServiceProvider {

	/**
	 * Indicates if loading of the provider is deferred.
	 *
	 * @var bool
	 */
	protected $defer = false;

	public function boot()
	{
		$this->package('pieter/form-component');
	}

	/**
	 * Register the service provider.
	 *
	 * @return void
	 */
	public function register()
	{
		
		$this->registerCDate();
	}



	private function registerCDate()
	{

		$this->app['cdate'] = $this->app->share(function($app) {

			$form = new DateComponent($app['html'], $app['url'], $app['session.store']->getToken());

			return $form->setSessionStore($app['session.store']);
		
		});
	}

	/**
	 * Get the services provided by the provider.
	 *
	 * @return array
	 */
	public function provides()
	{
		return array('cdate');
	}

}