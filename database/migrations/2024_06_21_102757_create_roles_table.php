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
        if(!Schema::hasTable('roles')){
            Schema::create('roles', function (Blueprint $table) {
                $table->id();
                $table->unsignedBigInteger("user_type_id");
                $table->unsignedBigInteger("user_id");
                $table->foreign('user_type_id')->references('id')->on('usertypes')->onDelete('set null');
                $table->foreign('user_id')->references('id')->on('users')->onDelete('set null');
            });
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('roles');
    }
};
