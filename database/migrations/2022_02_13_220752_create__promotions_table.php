<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePromotionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('promotions', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('student_id')->unsigned();

            $table->integer('from_grade')->unsigned();
            $table->bigInteger('from_classroom')->unsigned();
            $table->integer('from_school_years')->unsigned();

            $table->integer('to_grade')->unsigned();
            $table->bigInteger('to_classroom')->unsigned();
            $table->integer('to_school_years')->unsigned();

            $table->string('from_academic_year');
            $table->string('to_academic_year');

            $table->timestamps();

            $table->foreign('student_id')->references('id')->on('students')->onDelete('cascade');

            $table->foreign('from_grade')->references('id')->on('grades')->onDelete('cascade');
            $table->foreign('from_classroom')->references('id')->on('classrooms')->onDelete('cascade');
            $table->foreign('from_school_years')->references('id')->on('school_years')->onDelete('cascade');

            $table->foreign('to_grade')->references('id')->on('grades')->onDelete('cascade');
            $table->foreign('to_classroom')->references('id')->on('classrooms')->onDelete('cascade');
            $table->foreign('to_school_years')->references('id')->on('school_years')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('promotions');
    }
}
