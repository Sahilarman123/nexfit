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
        Schema::create('purchased_plans', function (Blueprint $table) {
            $table->id('plain_id');
            $table->unsignedBigInteger('plain_trainer_id');
            $table->unsignedBigInteger('plain_client_id');
            $table->unsignedBigInteger('plan_schedule_id')->nullable();
            $table->unsignedInteger('plan_total_session');
            $table->unsignedSmallInteger('plan_total_reschedule');
            $table->unsignedSmallInteger('plan_minutes');
            $table->double('plan_rate');
            $table->double('plan_discount')->nullable();
            $table->double('plan_sub_total');
            $table->double('plan_total');
            $table->unsignedSmallInteger('is_active')->default(0)->comment('0=pending,1=active,2=expired');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('purchased_plans');
    }
};
