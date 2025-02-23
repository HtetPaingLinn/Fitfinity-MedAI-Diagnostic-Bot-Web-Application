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
        Schema::create('dr_schedule', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('doctor_id');
            $table->foreign('doctor_id')->references('id')->on('doctoraccount');
            $table->string('day');
            $table->string('shift');
            $table->timestamps();
        });
    }
    public function down(): void
    {
        Schema::dropIfExists('dr_schedule');
    }
};
