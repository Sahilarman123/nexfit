<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('trainers', function (Blueprint $table) {
            $table->id('trainer_id');
            $table->string('trainer_name', 255);
            $table->string('trainer_last_name', 200)->nullable();
            $table->string('trainer_mobile_prefix', 255)->nullable();
            $table->string('trainer_mobile', 255)->nullable();
            $table->text('trainer_qr')->nullable();
            $table->string('trainer_email', 255)->nullable();
            $table->unsignedSmallInteger('trainer_status')->default(1)->comment('profile status = 1 (pending), 2= completed');
            $table->unsignedInteger('trainer_step')->default(1);
            $table->string('trainer_password', 255)->nullable();
            $table->string('trainer_gender', 255)->nullable();
            $table->date('trainer_dob')->nullable();
            $table->longText('trainer_address')->nullable();
            $table->string('trainer_city', 255)->nullable();
            $table->string('trainer_state', 255)->nullable();
            $table->string('trainer_pincode', 255)->nullable();
            $table->string('trainer_country', 255)->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('trainers');
    }
};
