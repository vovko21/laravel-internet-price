<?php

namespace App\Http\Middleware;

use App\Constants\Constants;
use App\Models\Order;
use Closure;
use Illuminate\Http\Request;

class CartIsNotEmpty
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        $orderId = session(Constants::$OrderId);

        if (!is_null($orderId)) {
            return $next($request);
        }
    }
}
