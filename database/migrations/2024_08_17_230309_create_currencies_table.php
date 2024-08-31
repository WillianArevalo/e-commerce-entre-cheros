<?php

use App\Enums\Status;
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
        Schema::create('currencies', function (Blueprint $table) {
            $table->id();
            $table->string("code");
            $table->string("symbol");
            $table->string("name");
            $table->decimal("exchange_rate", 10, 4);
            $table->boolean("is_default")->default(Status::INACTIVE);
            $table->boolean("auto_update")->default(Status::INACTIVE);
            $table->boolean("active")->default(Status::ACTIVE);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('currencies');
    }
};