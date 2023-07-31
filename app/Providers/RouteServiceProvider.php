<?php

namespace App\Providers;

use Illuminate\Cache\RateLimiting\Limit;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Facades\Route;

class RouteServiceProvider extends ServiceProvider
{
    public const HOME = '/';

    protected $apiNameSpace = 'App\\Http\\Controllers\\api';
    protected $dashBoardNameSpace = 'App\\Http\\Controllers\\dashBoard';

    public function boot()
    {
        $this->configureRateLimiting();

        $this->routes(function () {

            Route::prefix('dash-board')
                ->middleware(['web', 'auth'])
                ->namespace($this->dashBoardNameSpace)
                ->group(base_path('routes/dash-board.php'));

            Route::middleware('web')
                ->group(base_path('routes/web.php'));
        });
    }

    protected function configureRateLimiting()
    {
        RateLimiter::for('api', function (Request $request) {
            return Limit::perMinute(60)->by(optional($request->user())->id ?: $request->ip());
        });
    }
}
