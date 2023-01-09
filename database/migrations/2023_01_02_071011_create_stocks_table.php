<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('stocks', function (Blueprint $table) {
            $table->id();
            $table->foreignId('stock_category_id')->constrained('stock_categories');
            $table->foreignId('supplier_id')->constrained('suppliers');
            $table->string('name');
            $table->string('image')->nullable();
            $table->string('description')->nullable();
            $table->integer('number_items_unit');
            $table->integer('number_cases');
            $table->double('unit_price');
            $table->string('key_factor');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('stocks');
    }
};
