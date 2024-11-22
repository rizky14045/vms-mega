<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDetailVisitorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detail_visitors', function (Blueprint $table) {
            $table->id();
            $table->integer('register_user_id')->nullable()->refences('id')->on('register_users');
            $table->string('name')->nullable();
            $table->string('identity_number')->nullable();
            $table->string('phone_number')->nullable();
            $table->string('company')->nullable();
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
        Schema::dropIfExists('detail_visitors');
    }
}
