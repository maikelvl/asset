<?php namespace Crobays\Asset;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Config;
use Illuminate\Foundation\AliasLoader;

class AssetServiceProvider extends ServiceProvider {

	/**
	 * Indicates if loading of the provider is deferred.
	 *
	 * @var bool
	 */
	//protected $defer = false;

	/**
	 * Register the service provider.
	 *
	 * @return void
	 */
	public function register()
	{
		// $this->app->bind('asset', function($app){
		// 	return new Asset();
		// });
		$app = $this->app;
		$app['asset'] = $app->share(function ($app) {
			$config = $app['config']->get('asset::config');
			$config['_use-generator'] = $app->environment('local');
            return new AssetManager($config);
        });
		//$this->app->bind('asset', 'Crobays\Asset\Asset');
	}

	public function boot()
	{
		$this->package('crobays/asset');
		AliasLoader::getInstance()->alias('Asset', 'Crobays\Facades\Asset');
	}

	/**
	 * Get the services provided by the provider.
	 *
	 * @return array
	 */
	// public function provides()
	// {
	// 	return array();
	// }

}
