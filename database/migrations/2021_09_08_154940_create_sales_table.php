<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSalesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sales', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('quantity');
            $table->unsignedDecimal('discount');

            $table->foreignId('product_id')->constrained('products');
            $table->foreignId('sale_situation_id')->constrained('sale_situations');
            $table->foreignId('client_id')->constrained('clients');

            $table->timestamp('dh_sold')->nullable();
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
        Schema::dropIfExists('sales');
    }
}
