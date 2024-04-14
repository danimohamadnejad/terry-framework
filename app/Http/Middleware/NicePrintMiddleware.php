<?php
namespace App\Http\Middleware;
use Framework\Http\Request;

class NicePrintMiddleware {
  public function handle(Request $req, \Closure $next){
   echo "printing nice...<br/>"; 
   return $next($req); 
  }  
}