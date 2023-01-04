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
        Schema::create('users', function (Blueprint $table) {
            $table->integerIncrements('uid')->comment('User Id');
            $table->string('name',50)->comment('Name');
            $table->string('address',200)->comment('address');
            $table->string('email',50)->unique()->comment('Email');
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password')->comment('Password');
            $table->date('dob')->nullable()->default(null)->comment('Date of Birth');
            $table->rememberToken();
            $table->timestamps();
            $table->tinyInteger('sts')->default(1)->comment('Status');
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
}
