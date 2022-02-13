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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->char('qtyOrder', 15);
            $table->date('dateOrder');
            $table->char('totalPrice', 20);
            $table->timestamps();
        });
        Schema::table('orders', function (Blueprint $table) {
            $table->foreignId('product_id')->constrained('products');
        });
        Schema::table('orders', function (Blueprint $table) {
            $table->foreignId('category_id')->constrained('categories');
        });
        Schema::table('orders', function (Blueprint $table) {
            $table->foreignId('cutomer_id')->constrained('customers');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('orders');
    }
};