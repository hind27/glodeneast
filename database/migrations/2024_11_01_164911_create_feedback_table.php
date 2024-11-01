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
        Schema::create('feedback', function (Blueprint $table) {
            $table->id(); // Primary key
            $table->foreignId('product_id')->constrained()->onDelete('cascade'); // Foreign key to products
            $table->foreignId('user_id')->constrained()->onDelete('cascade'); // Foreign key to users
            $table->longText('comment')->nullable(); // Feedback comment
            $table->integer('score')->nullable(); // Score/rating
            $table->timestamps(); // created_at and updated_at
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('feedback');
    }
};
