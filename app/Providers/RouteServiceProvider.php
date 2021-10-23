<?php

namespace App\Providers;

use Illuminate\Cache\RateLimiting\Limit;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Facades\Route;

class RouteServiceProvider extends ServiceProvider
{
    /**
     * The path to the "home" route for your application.
     *
     * This is used by Laravel authentication to redirect users after login.
     *
     * @var string
     */
    public const HOME = '/home';

    /**
     * If specified, this namespace is automatically applied to your controller routes.
     *
     * In addition, it is set as the URL generator's root namespace.
     *
     * @var string
     */
    protected $namespace = null;

    /**
     * Define your route model bindings, pattern filters, etc.
     *
     * @return void
     */
    public function boot()
    {
        $this->configureRateLimiting();

        $this->routes(function () {
            Route::middleware('api')->group(base_path('routes/api/public.php'));
            Route::middleware('api')->group(shart_path('http/auth.php'));

            Route::middleware(['api', 'auth'])->prefix('system')->group(shart_path('http/user.php'));
            Route::middleware(['api', 'auth'])->prefix('system')->group(shart_path('http/role.php'));
            Route::middleware(['api', 'auth'])->prefix('system')->group(shart_path('http/notification.php'));
            Route::middleware(['api', 'auth'])->prefix('system')->group(shart_path('http/permission.php'));
            Route::middleware(['api', 'auth'])->prefix('system')->group(shart_path('http/setting.php'));

            Route::middleware(['api', 'auth'])->prefix('master')->group(shart_path('http/employee.php'));
            Route::middleware(['api', 'auth'])->prefix('master')->group(shart_path('http/organization.php'));
            Route::middleware(['api', 'auth'])->prefix('master')->group(shart_path('http/position.php'));
            Route::middleware(['api', 'auth'])->prefix('master')->group(shart_path('http/structure.php'));
        });
    }

    /**
     * Configure the rate limiters for the application.
     *
     * @return void
     */
    protected function configureRateLimiting()
    {
        RateLimiter::for('api', function (Request $request) {
            return Limit::perMinute(60);
        });
    }
}
