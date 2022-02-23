<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudentAccountsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('student_accounts', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('student_id')->unsigned();
            $table->integer('Grade_id')->unsigned();
            $table->integer('school_years_id')->unsigned();
            $table->date('date');
            $table->string('type');
            $table->bigInteger('fee_invoice_id')->unsigned();
            $table->float('debit')->unsigned();
            $table->float('credit')->unsigned();
            $table->string('notes')->nullable();
            $table->timestamps();


            $table->foreign('Grade_id')->references('id')->on('grades')->onDelete('cascade');
            $table->foreign('school_years_id')->references('id')->on('school_years')->onDelete('cascade');
            $table->foreign('student_id')->references('id')->on('students')->onDelete('cascade');
            $table->foreign('fee_invoice_id')->references('id')->on('fees_invoices')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('student_accounts');
    }
}
