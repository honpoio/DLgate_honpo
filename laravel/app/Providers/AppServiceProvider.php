<?php declare(strict_types=1);

namespace App\Providers;

use App;
use Illuminate\Support\ServiceProvider;
use URL;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        app()->bind('EndpointChange', 'App\Twitter_Oauth_Operation\EndpointChanges', true);
        app()->bind('User_Info', 'App\Twitter_Oauth_Operation\OAuth_AND_User_Info', true);
        $this->app->bind('Twitter_Operation', 'App\Twitter_Oauth_Operation\Twitter_Operation', true);
        app()->bind('DLgate_User_Table', 'Illuminate\Database\DLgate_Components\DLgate_User_Table');
        app()->bind('Gate_DB_Operation', 'Database\operateDB\DLgate_Operation_DB');
        app()->bind('User_DB_Operation', 'Database\operateDB\User_Operation_DB');
        // if ($this->app->environment('local', 'testing', 'staging')) {
        //     $this->app->register(DuskServiceProvider::class);
        // }
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        if (App::environment(['production'])) {
            URL::forceScheme('https');
        }
    }
}
