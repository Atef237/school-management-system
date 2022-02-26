<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAccountsFundsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('accounts_funds', function (Blueprint $table) {
            $table->id();
            $table->date('date');
            $table->bigInteger('receipt_id')->unsigned();
            $table->float('debit')->nullable();
            $table->float('credit')->nullable();
            $table->string('notes');
            $table->timestamps();

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
        Schema::dropIfExists('accounts_funds');
    }
}
