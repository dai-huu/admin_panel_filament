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
            $table->string('product_image')->nullable();
            $table->string('name'); // Tên sản phẩm
            $table->string('slug')->unique();
            $table->text('description')->nullable(); // Mô tả sản phẩm
            $table->decimal('price', 10, 0); // Giá sản phẩm
            $table->foreignId('categories_id')->constrained()->cascadeOnDelete();
            $table->json('categories')->nullable();
            $table->integer('quantity')->default(0); // Số lượng sản phẩm, mặc định là 0
            $table->boolean('availability')->default(false); //Trạng thái còn hàng, mặc định là 'không'
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
