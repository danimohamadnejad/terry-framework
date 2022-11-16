<?php
namespace App\Providers;
use Framework\Foundation\ServiceProvider;
use App\PaymentMethods\Paypal;
use App\PaymentMethods\PaymentMethod;

class AppServiceProvider extends ServiceProvider {
    public function boot(){
      $this->app->bind(PaymentMethod::class, Paypal::class);  
    }
}