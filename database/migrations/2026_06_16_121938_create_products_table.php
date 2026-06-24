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
        Schema::create('products', function (Blueprint $table) {

            $table->id();

            $table->foreignId('category_id')
                  ->constrained('categories')
                  ->cascadeOnDelete();

            $table->foreignId('location_id')
                  ->constrained('locations')
                  ->cascadeOnDelete();

            $table->string('name');

            $table->string('brand');

            $table->string('model');

            $table->year('year');

            $table->string('color');

   $table->enum('transmission', [
    'automatic',
    'manual'
]);

$table->enum('fuel_type', [
    'gasoline',
    'diesel',
    'hybrid',
    'electric'
]);
            $table->integer('seats');

            $table->text('description')->nullable();

            $table->enum('status', [
                '0',
                '1'
            ])->default('1');

            $table->boolean('available')->default(true);

            $table->decimal('daily_price', 10, 2);

            $table->decimal('weekly_price', 10, 2)->nullable();

            $table->decimal('monthly_price', 10, 2)->nullable();

            $table->decimal('deposit_amount', 10, 2)->default(0);

            $table->string('image')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};

