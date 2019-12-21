<?php

namespace App\Providers;

use App\Channel;
use App\Mixins\StrMixins;
use Illuminate\Routing\ResponseFactory;
use Illuminate\Support\Str;
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
		//SERVICE CONTAINER
		//$this->app->singleton(Class_Name::class,callback_function)

		$this->app->singleton(PaymentGateway::class,function($app){
			return new PaymentGateway("inr");
		});

		//FACADES
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
		//VIEWS

		//Option 1: Every Single view
		//Sharing data to every view

		// View::share('channels',Channel::orderBy('name')->get());

		//Option 2: granular View with wildcards
		// * indicates that inside channel folder we are giving access to all the files

		// View::composer(['channel.*','channel.add'], function($viewname){
		//     $viewname->with('channels',Channel::orderBy('name')->get());
		// });

		// Option 3: Dedicated View Composer Class
		//View::composer(folder_containing_view,Class_Name::class)
		View::composer('partials.channels.*',ChannelComposer::class);


		//MACROS
//		 Str::macro(function_name,callback_function)
//        Using Macro
        Str::macro('partNumber',function($part){
            return 'INDIAN MOBILE FORMAT  '.'+91 '.substr($part,0,4).'-'.substr($part,4,4).'-'.substr($part,8,10);
        });

        ResponseFactory::macro("errorJson",function($message = 'Custom Error Messgaes',$code){
	        return [
	            'messages' => $message,
                'response code'=> $code
            ];
        });



        //Using Mixins
        //partNumber with same method is created on Mixin
        //We are overriding the method
        //Passing false arg will deflacte the previous partNumber method
        Str::mixin(new StrMixins(),false);
    }
}
