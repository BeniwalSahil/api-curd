<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('table_city', function (Blueprint $table) {
            $table->id();
            $table->string('city_name');
            $table->string('state_name');
            $table->unsignedBigInteger('city_id');
            $table->foreign('city_id')->references('id')->on('table_student');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('table_city');
    }
};