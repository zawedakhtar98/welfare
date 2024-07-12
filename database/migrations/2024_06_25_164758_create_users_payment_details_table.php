<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users_payment_details', function (Blueprint $table) {
            $table->id();
            $table->double('amount');
            $table->bigInteger('user_id');
            $table->bigInteger('transaction_no');
            $table->enum('payment_mode',['online','cash']);
            $table->dateTime('payment_date');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users_payment_details');
    }
};
