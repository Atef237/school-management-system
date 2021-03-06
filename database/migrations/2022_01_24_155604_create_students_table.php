<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('students', function (Blueprint $table) {
            $table->id();
            $table->text('name');
            $table->string('email')->unique();
            $table->string('password');
            $table->bigInteger('gender_id')->unsigned();
            $table->bigInteger('nationalitie_id')->unsigned();
            $table->bigInteger('blood_id')->unsigned();
            $table->date('Date_Birth');
            $table->bigInteger('Grade_id')->unsigned();
            $table->bigInteger('Classroom_id')->unsigned();
            $table->bigInteger('school_years_id')->unsigned();
            $table->bigInteger('parent_id')->unsigned();
            $table->string('academic_year');
            $table->softDeletes();
            $table->timestamps();


            $table->foreign('gender_id')->references('id')->on('genders')->onDelete('cascade');
            $table->foreign('nationalitie_id')->references('id')->on('nationalities')->onDelete('cascade');
            $table->foreign('blood_id')->references('id')->on('type_bloods')->onDelete('cascade');
            $table->foreign('Grade_id')->references('id')->on('grades')->onDelete('cascade');
            $table->foreign('Classroom_id')->references('id')->on('classrooms')->onDelete('cascade');
            $table->foreign('school_years_id')->references('id')->on('school_years')->onDelete('cascade');
            $table->foreign('parent_id')->references('id')->on('my_parents')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('students');
    }
}
