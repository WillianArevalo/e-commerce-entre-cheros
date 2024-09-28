<?php

use App\Enums\ROLE;
use App\Enums\STATUS;
use App\Enums\THEME;
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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('username')->unique();
            $table->string('name');
            $table->string('last_name');
            $table->string('email')->unique();
            $table->string("profile")->default("images/default-profile.webp");
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->boolean("status")->default(STATUS::ACTIVE);
            $table->string('role')->default(ROLE::USER);
            $table->string('locale')->default('en');
            $table->string('timezone')->default('UTC');
            $table->string('currency')->default('USD');
            $table->timestamp('last_login')->nullable();
            $table->timestamp('last_activity')->nullable();
            $table->timestamp('last_password_change')->nullable();
            $table->string("last_ip_address")->nullable();
            $table->string("theme")->default(THEME::LIGHT);
            $table->string("color")->default("blue");
            $table->string("google_id")->nullable();
            $table->string("google_profile")->nullable();
            $table->rememberToken();
            $table->timestamps();
        });

        Schema::create('password_reset_tokens', function (Blueprint $table) {
            $table->string('email')->primary();
            $table->string('token');
            $table->timestamp('created_at')->nullable();
        });

        Schema::create('sessions', function (Blueprint $table) {
            $table->string('id')->primary();
            $table->foreignId('user_id')->nullable()->index();
            $table->string('ip_address', 45)->nullable();
            $table->text('user_agent')->nullable();
            $table->longText('payload');
            $table->integer('last_activity')->index();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
        Schema::dropIfExists('password_reset_tokens');
        Schema::dropIfExists('sessions');
    }
};
