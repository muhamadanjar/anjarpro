<?php namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Services\AnjarService;
use App\Lib\AHelper;
use App\Lib\UploadHandler;
class AnjarProvider extends ServiceProvider {

	/**
	 * Bootstrap the application services.
	 *
	 * @return void
	 */
	public function boot()
	{
		//
	}

	/**
	 * Register the application services.
	 *
	 * @return void
	 */
	public function register()
	{
		/*$this->app->bind(
			'App\Services\AnjarService'
		);*/

		$this->app['anjarclass'] = $this->app->share(function($app){
            return new AnjarService;
        });

        $this->app['ahelperclass'] = $this->app->share(function($app){
            return new AHelper;
        });
        $this->app['uploadhandlerclass'] = $this->app->share(function($app){
            return new UploadHandler;
        });

        $this->app->booting(function(){
            $loader = \Illuminate\Foundation\AliasLoader::getInstance();
            $loader->alias('AnjarService', 'App\Lib\Facades\AnjarClass');
        });

        $this->app->booting(function(){
            $loader = \Illuminate\Foundation\AliasLoader::getInstance();
            $loader->alias('AHelper', 'App\Lib\Facades\AHelperClass');
        });
        $this->app->booting(function(){
            $loader = \Illuminate\Foundation\AliasLoader::getInstance();
            $loader->alias('UploadHandler', 'App\Lib\Facades\UploadHandlerClass');
        });
	}

}
