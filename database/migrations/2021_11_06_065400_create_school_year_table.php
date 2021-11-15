<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSchoolYearTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('School_years', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->integer('classroom_id')->unsigned();
            $table->integer('grade_id')->unsigned();
            $table->timestamps();

            $table->foreign('grade_id')->references('id')->on('grades')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('classroom');
    }
}
