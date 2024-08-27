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
        Schema::create('shipping_methods', function (Blueprint $table) {
            $table->id();
            $table->string("name", 100);
            $table->text("description");
            $table->string("time", 100);
            $table->boolean("active")->default(true);
            $table->decimal("min_weight", 10, 2);
            $table->decimal("max_weight", 10, 2);
            $table->string("location", 100);
            $table->decimal("cost", 10, 2);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('shipping_methods');
    }
};
