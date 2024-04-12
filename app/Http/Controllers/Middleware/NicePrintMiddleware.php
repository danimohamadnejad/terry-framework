<?php
namespace App\Http\Middleware;
class NicePrintMiddleware {
  public function handle(Request $req, \Closure $next){
   echo "printing nice...<br/>";
   return $next($req); 
  }  
}