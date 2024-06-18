<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
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
            $table->string('product_name');
            $table->text('description')->nullable();
            $table->foreignId('section_id')->references('id')->on('sections')->cascadeOnDelete();
            $table->timestamps();
        });

        DB::table('products')->insert([
            ['product_name' => 'كارت أئتمان', 'description' => NULL, 'section_id' => 2, 'created_at' => '2024-06-18 07:29:37', 'updated_at' => '2024-06-18 07:29:37'],
            ['product_name' => 'كارت أئتمان', 'description' => NULL, 'section_id' => 3, 'created_at' => '2024-06-18 07:29:43', 'updated_at' => '2024-06-18 07:29:43'],
            ['product_name' => 'كارت أئتمان', 'description' => NULL, 'section_id' => 4, 'created_at' => '2024-06-18 07:29:48', 'updated_at' => '2024-06-18 07:29:48'],
            ['product_name' => 'كارت أئتمان', 'description' => NULL, 'section_id' => 5, 'created_at' => '2024-06-18 07:29:53', 'updated_at' => '2024-06-18 07:29:53'],
            ['product_name' => 'قرض شخصى', 'description' => NULL, 'section_id' => 6, 'created_at' => '2024-06-18 07:30:02', 'updated_at' => '2024-06-18 07:30:02'],
            ['product_name' => 'قرض شخصى', 'description' => NULL, 'section_id' => 7, 'created_at' => '2024-06-18 07:30:06', 'updated_at' => '2024-06-18 07:30:06'],
            ['product_name' => 'قرض شخصى', 'description' => NULL, 'section_id' => 1, 'created_at' => '2024-06-18 07:30:11', 'updated_at' => '2024-06-18 07:30:11'],
            ['product_name' => 'قرض شخصى', 'description' => NULL, 'section_id' => 2, 'created_at' => '2024-06-18 07:30:17', 'updated_at' => '2024-06-18 07:30:17'],
            ['product_name' => 'قرض عقارى', 'description' => NULL, 'section_id' => 4, 'created_at' => '2024-06-18 07:30:28', 'updated_at' => '2024-06-18 07:30:28'],
            ['product_name' => 'قرض عقارى', 'description' => NULL, 'section_id' => 2, 'created_at' => '2024-06-18 07:30:34', 'updated_at' => '2024-06-18 07:30:34'],
            ['product_name' => 'قرض سيارة', 'description' => NULL, 'section_id' => 7, 'created_at' => '2024-06-18 07:30:47', 'updated_at' => '2024-06-18 07:30:47'],
            ['product_name' => 'قرض سيارة', 'description' => NULL, 'section_id' => 6, 'created_at' => '2024-06-18 07:30:53', 'updated_at' => '2024-06-18 07:30:53'],
            ['product_name' => 'شهادات أسثمارية', 'description' => NULL, 'section_id' => 2, 'created_at' => '2024-06-18 07:31:06', 'updated_at' => '2024-06-18 07:31:06'],
            ['product_name' => 'شهادات أسثمارية', 'description' => NULL, 'section_id' => 4, 'created_at' => '2024-06-18 07:31:12', 'updated_at' => '2024-06-18 07:31:12'],
            ['product_name' => 'شهادات أسثمارية', 'description' => NULL, 'section_id' => 5, 'created_at' => '2024-06-18 07:31:18', 'updated_at' => '2024-06-18 07:31:18'],
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};


