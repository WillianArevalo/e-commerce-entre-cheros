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
        Schema::create('coupons', function (Blueprint $table) {
            $table->id();
            $table->string("code")->unique();
            $table->decimal("discount_value", 8, 2);
            $table->enum("discount_type", ["percentage", "fixed"]);
            $table->date("start_date");
            $table->date("end_date");
            $table->boolean("active")->default(true);
            $table->string("type");
            $table->integer("usage_limit")->nullable()->default(1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('coupons');
    }
};
