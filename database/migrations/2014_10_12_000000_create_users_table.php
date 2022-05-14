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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('username')->unique();
            $table->rememberToken();
            $table->timestamps();
            $table->string('role')->default('NULL');
            $table->string('userType')->default('NULL');
            $table->string('phone')->default('NULL');

            $table->date('dob')->default(today());
            $table->string('country')->default('NULL');
            $table->string('gender')->default('NULL');
            $table->string('sector')->default('NULL');

            $table->string('background')->default('NULL');
        });
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
};
