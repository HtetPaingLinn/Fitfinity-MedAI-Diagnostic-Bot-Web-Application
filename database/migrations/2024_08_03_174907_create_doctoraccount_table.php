<?php

use App\Models\Department;
use App\Models\Role;
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
        Schema::create('doctoraccount', function (Blueprint $table) {
            $table->id();
            $table->string('doctor_name');
            $table->string('email')->unique();
            $table->string('phone');
            $table->string('password');
            $table->unsignedBigInteger('dept_id');
            $table->unsignedBigInteger('role_id');
            $table->timestamps();

            $table->foreign('dept_id')->references('id')->on('departments');
            $table->foreign('role_id')->references('id')->on('roles');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('doctors');
    }
};
