<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Config;

class SettingServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind('settings', function ($app){
            return new Setting();
        });

        $loader =  \Illuminate\Foundation\AliasLoader::getInstance();
        $loader->alias('Setting', Setting::class);
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        if (!\App::runningInConsole() && count(Schema::getColumnListing('settings'))) {
            $settings = Setting::all();

            foreach ($settings as $key => $settings) {
                Config::set('settings.'.$setting->key,$setting->value);
            }
        }
    }
}