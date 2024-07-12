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
        Schema::table("users",function(Blueprint $table){
            // $table->increments('id');
            $table->string("fname",255)->after('id');
            $table->string("lname",255)->after('fname');
            $table->string("email",255)->unique()->after('lname');
            $table->string("password",255)->after('email');
            $table->string("contact_no",11)->after('password');
            $table->string("alter_contact_no",11)->nullable()->after('contact_no');
            $table->string("permanent_address",255)->after('alter_contact_no');
            $table->string("living_address",255)->after('permanent_address');
            $table->integer('state_id')->nullable()->unsigned()->after('living_address');
            $table->integer('city_id')->nullable()->unsigned()->after('state_id');        
            $table->boolean('is_deleted')->default(false)->after('city_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users',function(Blueprint $table){    
            $table->dropColumn('fname');
            $table->dropColumn('lname');
            $table->dropColumn('email');
            $table->dropColumn('password');
            $table->dropColumn('contact_no');
            $table->dropColumn('alter_contact_no');
            $table->dropColumn('permanent_address');
            $table->dropColumn('living_address');
            $table->dropColumn('state_id');
            $table->dropColumn('city_id');
            $table->dropColumn('is_deleted');
        });
    }
};
