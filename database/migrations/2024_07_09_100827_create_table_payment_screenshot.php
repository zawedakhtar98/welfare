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
        Schema::create('payment_screenshot', function (Blueprint $table) {
            $table->id();
            $table->string('uploaded_img',255);
            $table->bigInteger('member_id');
            $table->bigInteger('action_by');
            $table->enum('status',['verify','not verify']);
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
        Schema::dropIfExists('payment_screenshot');
    }
};
