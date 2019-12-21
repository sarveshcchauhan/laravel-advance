<?php

namespace App\Providers;

use App\Channel;
use App\Billing\PaymentGateway;
use App\PostCardSendingService;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
use App\Http\View\Composers\ChannelComposer;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services. 
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(PaymentGateway::class,function($app){
            return new PaymentGateway("inr");
        });

        $this->app->singleton('PostCard',function($app){
            return new PostCardSendingService('us',4,6);
        });
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //Option 1: Every Single view
        //Sharing data to every view

        // View::share('channels',Channel::orderBy('name')->get());

        //Option 2: granular View with wildcards
        // * indicates that inside channel folder we are giving access to all the files 

        // View::composer(['channel.*','channel.add'], function($viewname){
        //     $viewname->with('channels',Channel::orderBy('name')->get());
        // });

        // Option 3: Dedicated View Composer Class
        View::composer('partials.channels.*',ChannelComposer::class);


    }
}
