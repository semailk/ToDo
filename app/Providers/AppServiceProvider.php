<?php

namespace App\Providers;

use App\Repository\Task\Contract\TaskRepositoryInterface;
use App\Repository\Task\TaskRepository;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->app->bind(TaskRepositoryInterface::class, TaskRepository::class);
    }
}
