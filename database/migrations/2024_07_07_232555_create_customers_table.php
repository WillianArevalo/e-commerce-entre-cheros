<?php

use App\Enums\STATUS;
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
        Schema::create('customers', function (Blueprint $table) {
            $table->id();
            $table->string("phone")->nullable();
            $table->date("birthdate")->nullable();
            $table->enum("gender", ["male", "female", "other"])->nullable();
            $table->boolean("status")->default(STATUS::ACTIVE);
            $table->string("area_code")->nullable();
            $table->foreignId("user_id")->constrained()->onDelete("cascade");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('customers');
    }
};