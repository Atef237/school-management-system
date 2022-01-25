<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClassroomsTable extends Migration {

	public function up()
	{
        Schema::create('classrooms', function(Blueprint $table) {
            $table->id();
			$table->string('name');
			$table->string('status')->nullable();
			$table->integer('grade_id')->unsigned();
			$table->integer('school_year_id')->unsigned();
            $table->timestamps();

            $table->foreign('school_year_id')->references('id')->on('school_years')->onDelete('cascade');
            $table->foreign('grade_id')->references('id')->on('Grades')->onDelete('cascade');


        });
	}

    public function down()
    {
        Schema::drop('classrooms');
    }
}
