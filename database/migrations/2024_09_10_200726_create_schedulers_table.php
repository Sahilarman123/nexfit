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
        Schema::create('schedulers', function (Blueprint $table) {
            $table->id('sch_id');
            $table->unsignedBigInteger('sch_trainer_id');
            $table->unsignedBigInteger('sch_client_id');
            $table->unsignedBigInteger('sch_plan_id')->nullable();
            $table->unsignedBigInteger('sch_package_id')->nullable();
            $table->unsignedInteger('sch_session');
            $table->unsignedInteger('sch_schedule')->nullable();
            $table->string('sch_minutes', 20)->nullable();
            $table->double('sch_rate')->nullable();
            $table->double('sch_discount')->nullable();
            $table->double('sch_total')->nullable();
            $table->double('sch_net')->nullable();
            $table->unsignedInteger('sch_rescheduled')->default(0);
            $table->date('sch_date')->nullable();
            $table->unsignedSmallInteger('sch_is_expired')->default(0)->comment('0=active,1=expired');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down()
    {
        Schema::dropIfExists('schedulers');
    }
};
