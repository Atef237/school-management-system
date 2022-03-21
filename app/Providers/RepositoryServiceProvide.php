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
        $this->app->bind('App\Interfaces\ReceiptStudentRepositoryInterface', 'App\Repository\ReceiptStudentRepository');
        $this->app->bind('App\Interfaces\ProcessingFeeRepositoryInterface', 'App\Repository\ProcessingFeeRepository');
        $this->app->bind('App\Interfaces\PaymentRepositoryInterface', 'App\Repository\PaymentRepository');
        $this->app->bind('App\Interfaces\AttendancesStudentRepositoryInterface', 'App\Repository\AttendancesStudentRepository');
        $this->app->bind('App\Interfaces\SubjectsRepositoryInterface', 'App\Repository\SubjectsRepository');

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
