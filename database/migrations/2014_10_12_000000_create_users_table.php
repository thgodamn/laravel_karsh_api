<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasTable('users')) {
            Schema::create('users', function (Blueprint $table) {
                $table->id();
                $table->string('name');
                $table->string('email')->unique();
                $table->timestamp('email_verified_at')->nullable();
                $table->string('password');
                $table->integer('car_id')->unsigned();
                #$table->foreignId('car_id')->constrained();
                $table->rememberToken();
                $table->timestamps();

                $table->foreign('car_id')->references('id')->on('cars');
            });
        }

        #Schema::table('users', function(Blueprint $table) {
        #    $table->foreignId('car_id')->constrained();
        #});
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
