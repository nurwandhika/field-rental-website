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
        Schema::create('transactions', function (Blueprint $table) {
            $table->id();
            $table->decimal("total",14,2);
            $table->bigInteger("admin_id")->default(0)->index();
            $table->bigInteger("user_id")->default(0)->index();
            $table->string("booking_type")->default("online");
            $table->string("image")->default('');
            $table->string("status")->default("success");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transactions');
    }
};
