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
        Schema::create('qualifications', function (Blueprint $table) {
            $table->id('q_id');
            $table->unsignedBigInteger('q_user_id');
            $table->string('q_name_id', 255);
            $table->date('q_date')->nullable();
            $table->unsignedSmallInteger('q_notifiy')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('qualifications');
    }
};
