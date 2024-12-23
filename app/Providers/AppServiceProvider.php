<?php

namespace App\Providers;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Response::macro('prettyjson', function ($value, $status = 200) {
            return Response::make(json_encode($value, JSON_PRETTY_PRINT), $status)->header('Content-Type', 'application/json');
        });

        Response::macro('errorStud', function ($isError, $errorMessage = '') {
            return ["isError"=>$isError , 'errorMessage'=>$errorMessage];
        });
    }
}
