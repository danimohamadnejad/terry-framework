<?php
namespace App\Providers;
use Framework\Foundation\ServiceProvider;
use App\PaymentMethods\Paypal;
use App\PaymentMethods\PaymentMethod;
use Framework\Foundation\View\View;

class AppServiceProvider extends ServiceProvider {
    public function boot(){
      View::share(['app_name'=>'This is nice application']);
      $this->app->bind(PaymentMethod::class, Paypal::class);  
    }
}