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
        Schema::create('packages', function (Blueprint $table) {
            $table->id('p_id');
            $table->unsignedBigInteger('p_user_id');
            $table->unsignedBigInteger('p_session');
            $table->unsignedInteger('p_schedule')->nullable();
            $table->unsignedInteger('p_minutes')->default(60);
            $table->unsignedBigInteger('p_rate');
            $table->unsignedBigInteger('p_discount')->nullable();
            $table->unsignedBigInteger('p_total')->nullable();
            $table->unsignedBigInteger('p_net_total')->nullable();
            $table->unsignedInteger('p_is_deleted')->default(1);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('packages');
    }
};
