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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->integer('id_customer');
            $table->integer('id_category');
            $table->integer('id_employees');
            $table->string('customer_name');
            $table->string('type_laundry');
            $table->date('order_date');
            $table->date('out_date');
            $table->integer('amount_weight');
            $table->string('status');
            $table->integer('total_price');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
