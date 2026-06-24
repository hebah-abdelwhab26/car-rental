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
        Schema::create('favorites', function (Blueprint $table) {
            $table->id();

            // المستخدم الذي أضاف السيارة للمفضلة
            $table->foreignId('user_id')->constrained()->onDelete('cascade');

            // السيارة المضافة للمفضلة
            $table->foreignId('product_id')->constrained()->onDelete('cascade');

            $table->timestamps();

            // منع تكرار نفس السيارة لنفس المستخدم أكثر من مرة
            $table->unique(['user_id', 'product_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('favorites');
    }
};
