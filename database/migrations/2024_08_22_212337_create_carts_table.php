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
        Schema::create('carts', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->foreignId("shipping_method_id")->nullable()->constrained()->onDelete("set null");
            $table->foreignId("coupon_id")->nullable()->constrained()->onDelete("set null");
            $table->timestamps();
        });

        Schema::create("cart_items", function (Blueprint $table) {
            $table->id();
            $table->foreignId("cart_id")->constrained()->onDelete("cascade");
            $table->foreignId("product_id")->constrained()->onDelete("cascade");
            $table->integer("quantity");
            $table->decimal("sub_total", 10, 2);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('carts');
        Schema::dropIfExists('cart_items');
    }
};
