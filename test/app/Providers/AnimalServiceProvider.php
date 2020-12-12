<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Animals\Bird;
use App\Animals\Food;

class AnimalServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind('bird', function($app){
    	    return new Bird($app->make(Food::class));
    	});
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        $bird = $app->make('bird');
        $returnText = "Sound : ". $bird->sound();
        $returnText .= "<br>Food : ". $bird->getFood()->foodType();
        echo $returnText;
    }
}
