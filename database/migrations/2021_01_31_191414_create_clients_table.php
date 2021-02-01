<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clients', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('status');
            $table->string('avatar');
            $table->string('socialReason')->unique();
            $table->string('cnpj')->unique();
            $table->string('phone');
            $table->string('celPhone')->unique()->nullable();
            $table->string('email')->unique();
            $table->string('city');
            $table->string('neighborhood');
            $table->string('state');
            $table->string('number')->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
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
        Schema::dropIfExists('clients');
    }
}
