<?php
namespace App\Http\Middleware;
use Framework\Http\Request;

class GoodPrintMiddleware {
  public function handle(Request $req, \Closure $next){
   echo "printing good...<br/>"; 
   return $next($req); 
  }  
}