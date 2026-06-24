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
        Schema::table('car_images', function (Blueprint $table) {

            if (!Schema::hasColumn('car_images', 'product_id')) {
                $table->foreignId('product_id')
                    ->after('id')
                    ->constrained('products')
                    ->onDelete('cascade');
            }

            if (!Schema::hasColumn('car_images', 'image')) {
                $table->string('image')->after('product_id');
            }

            if (!Schema::hasColumn('car_images', 'sort_order')) {
                $table->integer('sort_order')->default(0)->after('image');
            }
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('car_images', function (Blueprint $table) {

            if (Schema::hasColumn('car_images', 'sort_order')) {
                $table->dropColumn('sort_order');
            }

            if (Schema::hasColumn('car_images', 'image')) {
                $table->dropColumn('image');
            }

            if (Schema::hasColumn('car_images', 'product_id')) {
                $table->dropForeign(['product_id']);
                $table->dropColumn('product_id');
            }
        });
    }
};
