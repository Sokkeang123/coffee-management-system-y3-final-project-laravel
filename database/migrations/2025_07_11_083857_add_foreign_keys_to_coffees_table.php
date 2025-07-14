<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
   

    public function up()
    {
        Schema::table('coffees', function (Blueprint $table) {
            $table->foreign('category_id')->references('categoryId')->on('categories');
            $table->foreign('supplier_id')->references('supplierId')->on('suppliers');
        });
    }

    public function down()
    {
        Schema::table('coffees', function (Blueprint $table) {
            $table->dropForeign(['category_id']);
            $table->dropForeign(['supplier_id']);
        });
    }
};
