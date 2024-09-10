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
        Schema::create('certificates', function (Blueprint $table) {
            $table->id('c_id');
            $table->string('c_name');
            $table->timestamps();  // This automatically adds c_created_at and c_updated_at columns
        });
    }

    public function down()
    {
        Schema::dropIfExists('certificates');
    }

};
