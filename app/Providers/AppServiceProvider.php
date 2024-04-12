<?php
namespace App\Providers;
use Framework\Foundation\ServiceProvider;
use App\PaymentMethods\Paypal;
use App\PaymentMethods\PaymentMethod;
use Framework\Foundation\View\View;
use App\Http\Middleware\NicePrintMiddleware;
use App\Http\Middleware\GoodPrintMiddleware;

class AppServiceProvider extends ServiceProvider {
    public function boot(){
      View::share(['app_name'=>'This is nice application']);
      $this->app->bind(PaymentMethod::class, Paypal::class);  
      $this->app->middleware()->register([
        'niceprint'=>NicePrintMiddleware::class,
        'goodprint'=>GoodPrintMiddleware::class,
      ]);
    }
}