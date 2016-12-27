<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Validator;
use App\Http\Repositories\Jobs\JobRepositoryContract;
use App\Http\Repositories\Jobs\JobRepository;

class AppServiceProvider extends ServiceProvider
{

    protected $repositories = [
        JobRepositoryContract::class => JobRepository::class,
    ];

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Validator::extend('not_html', function ($attribute, $value, $parameters, $validator) {
            $pass = false;
            $pattern = '/^[a-zA-Z0-9 "!?_-]+$/';
            preg_match($pattern, $value, $matches);
            if (!empty($matches)) {
                $pass = true;
            }
            return $pass;
        });
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->registerRepositories();
    }

    /**
     * Registers repository interfaces and binds them to an implementation.
     *
     * @return void
     */
    protected function registerRepositories()
    {
        foreach ($this->repositories as $interface => $repository) {
            $this->app->singleton($interface, $repository);
        }
    }

}
