<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePersonalRegistersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('personal_registers', function (Blueprint $table) {
            $table->id();
            $table->integer('register_user_id')->nullable()->refences('id')->on('register_users');
            $table->string('name')->nullable();
            $table->string('identity_number')->nullable();
            $table->string('email')->nullable();
            $table->string('office_number')->nullable();
            $table->string('phone_number')->nullable();
            $table->boolean('onsite_check')->default(false);
            $table->boolean('email_check')->default(false);
            $table->boolean('oncall_check')->default(false);
            $table->text('note')->nullable();
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
        Schema::dropIfExists('personal_registers');
    }
}
