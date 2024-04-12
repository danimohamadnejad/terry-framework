<?php
namespace App\Http\Middleware;
class GoodPrintMiddleware {
  public function handle(Request $req, \Closure $next){
   echo "printing good...<br/>";
   return $next($req); 
  }  
}