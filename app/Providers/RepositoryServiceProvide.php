<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvide extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind('App\Interfaces\TeacherRepositoryInterface', 'App\Repository\TeacherRepository');
        $this->app->bind('App\Interfaces\studentRepositoryInterface', 'App\Repository\studentRepository');
        $this->app->bind('App\Interfaces\StudentPromotionRepositoryInterface', 'App\Repository\StudentPromotionRepository');
        $this->app->bind('App\Interfaces\StudentGraduatedRepositoryInterface', 'App\Repository\StudentGraduatedRepository');
        $this->app->bind('App\Interfaces\StudentFeesRepositoryInterface', 'App\Repository\StudentFeesRepository');
        $this->app->bind('App\Interfaces\FeeInvoicesRepositoryInterface', 'App\Repository\FeeInvoicesRepository');
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
