<?php

namespace App\Providers;

use App\Models\EmailConfiguration;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Schema;

class MailConfigProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {

    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot() {

        // get email view data in provider class
         view()->composer('email', function ($view) {

            if(Schema::hasTable('EmailConfiguration')) {

                $configuration = EmailConfiguration::first();
                if($configuration){
                    $config = array(
                        'driver'     =>     $configuration->driver,
                        'host'       =>     $configuration->host,
                        'port'       =>     $configuration->port,
                        'encryption' =>     $configuration->encryption,
                        'username'   =>     $configuration->user_name,
                        'password'   =>     $configuration->password,
                        'from'       =>     ['address' => $configuration->sender_email, 'name' => $configuration->sender_name],
                    );
                    Config::set('mail', $config);
                }

            }

        });
    }
}
