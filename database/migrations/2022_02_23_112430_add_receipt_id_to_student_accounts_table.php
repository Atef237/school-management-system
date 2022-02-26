<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddReceiptIdToStudentAccountsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('student_accounts', function (Blueprint $table) {
            $table->bigInteger('receipt_id')->nullable()->unsigned();

            $table->foreign('receipt_id')->references('id')->on('receipt_students')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('student_accounts', function (Blueprint $table) {
            //
        });
    }
}
