<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('medical_record', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('appointment_id');
            $table->foreign('appointment_id')->references('id')->on('appointments');
            $table->string('allergies');
            $table->string('surgery_history');
            $table->string('past_med_history');
            $table->string('current_disease');
            $table->string('family_history');
            $table->string('medications');
            $table->timestamps();
        });
    }
    public function down(): void
    {
        Schema::dropIfExists('medical_record');
    }
};
