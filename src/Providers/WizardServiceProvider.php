<?php

namespace Acacha\Wizard\Providers;

use Illuminate\Console\AppNamespaceDetectorTrait;
use Illuminate\Support\ServiceProvider;

/**
 * Class WizardServiceProvider
 * @package Acacha\Wizard\Providers
 */
class WizardServiceProvider extends ServiceProvider
{
    use AppNamespaceDetectorTrait;

    /**
     * @var string
     */
    protected $namespace = 'Acacha\Wizard\Http\Controllers';

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        if (!defined('ACACHA_WIZARD_PATH')) {
            define('ACACHA_WIZARD_PATH', realpath(__DIR__.'/../../'));
        }
    }

    /**
     * Bootstrap the application services.
     */
    public function boot()
    {
        $this->defineRoutes();
        $this->configureDatabaseFiles();
        $this->publishViews();
        $this->publishVueComponents();
    }

    /**
     * Define the wizard routes.
     */
    protected function defineRoutes()
    {
        if (!$this->app->routesAreCached()) {
            $router = app('router');
            $router->group(['namespace' => $this->namespace ], function () {
                require ACACHA_WIZARD_PATH . '/src/Http/web_routes.php';
            });
        }
    }

    /**
     * Publish migrations, seeds and factories.
     */
    protected function configureDatabaseFiles()
    {
        $this->loadMigrationsFrom( ACACHA_WIZARD_PATH . 'database/migrations');
        $this->publishes([
            ACACHA_WIZARD_PATH . '/database/seeds/WizardTablesSeeder.php' => database_path('seeds/WizardTablesSeeder.php'),
            ACACHA_WIZARD_PATH . '/database/factories/WizardFactory.php' => database_path('factories/WizardFactory.php'),
        ], 'acacha_wizard');
    }

    /**
     * Publish package views to Laravel project.
     */
    private function publishViews()
    {
        $this->loadViewsFrom(ACACHA_WIZARD_PATH.'/resources/views/', 'acacha_wizard');

        $this->publishes([
            ACACHA_WIZARD_PATH.'/resources/views/wizard.blade.php'
            => resource_path('views/vendor/acacha_wizard/wizard.blade.php'),
            ], 'acacha_wizard');
    }

    private function publishVueComponents()
    {
        $this->publishes([
            ACACHA_WIZARD_PATH.'/resources/assets/js/components/Wizard.vue'
            => resource_path('assets/js/components/acacha-wizard/Wizard.vue'),
        ], 'acacha_wizard');
    }
}