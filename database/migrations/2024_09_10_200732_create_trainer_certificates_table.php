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
        Schema::create('trainer_certificates', function (Blueprint $table) {
            $table->id('tc_id');
            $table->unsignedBigInteger('tc_user_id');
            $table->unsignedBigInteger('tc_certificate');
            $table->string('tc_certificate_name', 200)->nullable();
            $table->date('tc_expiry_date')->nullable();
            $table->unsignedSmallInteger('tc_is_notify')->default(0);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('trainer_certificates');
    }
};
