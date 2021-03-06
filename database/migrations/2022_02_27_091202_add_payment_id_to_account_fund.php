<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddPaymentIdToAccountFund extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('accounts_funds', function (Blueprint $table) {

            $table->bigInteger('payment_id')->unsigned()->nullable();

            $table->foreign('payment_id')->references('id')->on('payment_students')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('accounts_funds', function (Blueprint $table) {
            //
        });
    }
}
