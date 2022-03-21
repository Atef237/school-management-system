<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFeesInvoicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fees_invoices', function (Blueprint $table) {
            $table->id();
            $table->date('invoice_date');
            $table->bigInteger('student_id')->unsigned();
            $table->bigInteger('Grade_id')->unsigned();
            $table->bigInteger('school_years_id')->unsigned();
            $table->bigInteger('fee_id')->unsigned();
            $table->float('amount');
            $table->string('notes')->nullable();
            $table->timestamps();

            $table->foreign('Grade_id')->references('id')->on('grades')->onDelete('cascade');
            $table->foreign('school_years_id')->references('id')->on('school_years')->onDelete('cascade');
            $table->foreign('fee_id')->references('id')->on('fees')->onDelete('cascade');
            $table->foreign('student_id')->references('id')->on('students')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('fees_invoices');
    }
}
