<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    // Drop the table if it exists

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Drop the table if it exists

        Schema::create('products', function (Blueprint $table) {
            $table->id(); // This creates an unsignedBigInteger primary key column
            $table->string('name');
            $table->string('name_ar');
            $table->string('des')->nullable();
            $table->string('des_ar')->nullable();
            // $table->unsignedBigInteger('category_id')->nullable(); // Define as unsignedBigInteger
            $table->timestamps();

            // Add the foreign key constraint
            // $table->foreign('category_id')->references('id')->on('categories')->onDelete('set null');
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('products', function (Blueprint $table) {
            $table->dropColumn('name_ar');
            $table->string('des')->nullable(false)->change();
            $table->string('des_ar')->nullable(false)->change();
            // $table->dropForeign(['category_id']);
        });
    }
};
