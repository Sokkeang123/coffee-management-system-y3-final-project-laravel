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
        Schema::create('coffees', function (Blueprint $table) {
            $table->id('coffeeId');
            $table->string('name');
            $table->string('size');
            $table->decimal('price', 8, 2);
            $table->integer('stock');
            $table->unsignedBigInteger('category_id');
            $table->unsignedBigInteger('supplier_id');
            $table->timestamps();

            $table->foreign('category_id')
                ->references('categoryId')
                ->on('categories')
                ->onDelete('cascade');

            $table->foreign('supplier_id')
                ->references('supplierId')
                ->on('suppliers')
                ->onDelete('cascade');
        });
    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('coffees');
    }
};
