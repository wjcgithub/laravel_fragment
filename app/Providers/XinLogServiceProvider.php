<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Services\Common\XinLogService;

class XinLogServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {

    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton('xinlog',function(){
            return new XinLogService();
        });

        // true 表示共享模式开启
        $this->app->bind('App\Contracts\LogContract',function(){
            return new XinLogService();
        },true);
    }
}