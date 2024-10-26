<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
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
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->string('order_number')->unique();
            
            $table->enum('status', ['pending', 'processing', 'completed', 'cancelled'])->default('pending');
            $table->decimal('total_amount', 10, 2);
            $table->decimal('discount', 10, 2)->nullable();
            $table->string('payment_method')->nullable();
            $table->enum('payment_status', ['paid', 'unpaid', 'refunded'])->default('unpaid');
            $table->string('transaction_id')->nullable();
            $table->json('billing_address');
            $table->json('shipping_address')->nullable();
            $table->string('shipping_method')->nullable();
            $table->decimal('shipping_cost', 10, 2)->nullable();
            $table->date('delivery_date')->nullable();
            $table->text('notes')->nullable();
            $table->decimal('tax_amount', 10, 2)->nullable();
            $table->string('currency', 3)->default('USD');
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
        Schema::dropIfExists('orders');
    }
}

