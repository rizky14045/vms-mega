<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRegisterUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('register_users', function (Blueprint $table) {
            $table->id();
            $table->string('uuid')->nullable();
            $table->string('register_code')->nullable();
            $table->string('name')->nullable();
            $table->string('identity_number')->nullable();
            $table->string('visitor_type')->nullable();
            $table->integer('tenant_id')->nullable();
            $table->string('vendor_name')->nullable();
            $table->string('vendor_address')->nullable();
            $table->string('email')->nullable();
            $table->string('office_number')->nullable();
            $table->string('phone_number')->nullable();
            $table->string('reference')->nullable();
            $table->string('attachment_reference')->nullable();
            $table->string('area')->nullable();
            $table->string('room_name')->nullable();
            $table->string('necessary')->nullable();
            $table->boolean('laptop')->default(false);
            $table->boolean('handphone')->default(false);
            $table->boolean('other')->default(false);
            $table->string('other_text')->nullable();
            $table->string('category')->nullable(); 
            $table->date('visit_date')->nullable();
            $table->boolean('check_in_status')->default(false);
            $table->timestamp('check_in')->nullable();
            $table->string('check_in_image')->nullable();
            $table->string('check_in_identity')->nullable();
            $table->boolean('check_out_status')->default(false);
            $table->timestamp('check_out')->nullable();
            $table->string('check_out_image')->nullable();
            $table->string('check_out_identity')->nullable();
            $table->integer('rangking')->nullable();
            $table->string('status')->nullable();
            $table->string('key')->nullable();
            $table->integer('check_in_by')->nullable();
            $table->integer('check_out_by')->nullable();
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
        Schema::dropIfExists('register_users');
    }
}
