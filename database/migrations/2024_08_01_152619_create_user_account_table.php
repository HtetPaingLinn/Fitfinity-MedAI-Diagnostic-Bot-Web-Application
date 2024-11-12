<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('user_account', function (Blueprint $table) {
            $table->id();
            $table->string('username');
            $table->string('email')->unique();
            $table->string('phone');
            $table->date('date_of_birth');
            $table->string('password');
            $table->string('weight');
            $table->string('height');
            $table->string('gender');
            $table->string('blood');
            $table->string('NRC');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('user_account');
    }
};
