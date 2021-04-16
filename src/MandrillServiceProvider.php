<?php

namespace Intonate\Mandrill;

use Illuminate\Support\ServiceProvider;

class MandrillServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->app('mailer')->getSwiftMailer()->extend('mandrill', function () {
            return TransportFactory::mandrill(
                $this->app['config']->get('services.mandrill', [])
            );
        });
    }
}
