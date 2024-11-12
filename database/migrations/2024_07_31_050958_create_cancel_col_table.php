<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        if (DB::getDriverName() !== 'sqlite') {
            Schema::table('users', function (Blueprint $table) {
                $table->dropColumn('NRC');
            });
        } else {
            // For SQLite, you need to manually recreate the table without the NRC column
            Schema::create('temp_users', function (Blueprint $table) {
                $table->id();
                $table->string('name');
                $table->string('email')->unique();
                $table->timestamp('email_verified_at')->nullable();
                $table->string('password');
                $table->rememberToken();
                $table->timestamps();
            });

            DB::statement('INSERT INTO temp_users (id, name, email, email_verified_at, password, remember_token, created_at, updated_at) SELECT id, name, email, email_verified_at, password, remember_token, created_at, updated_at FROM users');

            Schema::drop('users');

            Schema::rename('temp_users', 'users');
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('NRC')->unique()->default('xx/xxx(x)/xxxxxx');
        });
    }
};
