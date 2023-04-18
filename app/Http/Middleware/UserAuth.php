<?php
namespace App\Http\Middleware;

use App\Traits\ResponseTrait;
use Closure;
use Illuminate\Support\Facades\Auth;

class AdminAuth {

const GUARD_ADMIN = ['user'];

/**
 * Handle an incoming request.
 *
 * @param \Illuminate\Http\Request $request
 * @param \Closure $next
 * @return mixed
 */
public function handle($request, Closure $next)
{
    if (Auth::guard(self::GUARD_ADMIN)->check()) {
        return $next($request);
    }

    return abort(401);
}
}

/* + Khai báo middleware trong `app/Http/Middleware/Kernel.php` để sử dụng middleware. Khai báo thêm `'admin' => \App\Http\Middleware\AdminAuth::class` vào $routeMiddleware như sau:
```php
  protected $routeMiddleware = [
      ...
      'admin' => \App\Http\Middleware\AdminAuth::class,
      ...
  ]; */
