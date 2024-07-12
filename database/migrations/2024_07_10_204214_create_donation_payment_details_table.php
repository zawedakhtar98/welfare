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
        Schema::create('donation_payment_details', function (Blueprint $table) {
            $table->id();
            $table->string('name',255);
            $table->string('mobile_no',255)->unique();
            $table->string('aadhaar_no',255)->unique();
            $table->string('address',500)->nullable();
            $table->dateTime('given_date');
            $table->double('given_amount');
            $table->enum('payment_mode',['online','cash','check'])->default(null);
            $table->string('check_no',255)->nullable();
            $table->bigInteger('transaction_no')->unique();
            $table->string('given_by_name',255);
            $table->bigInteger('given_by_memberid');
            $table->string('description',500);
            $table->string('image',300);
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
        Schema::dropIfExists('donation_payment_details');
    }
};
