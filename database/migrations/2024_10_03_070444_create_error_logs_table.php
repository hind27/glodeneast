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
        Schema::create('error_logs', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('loggable_id')->nullable(); // ID of the associated resource
            $table->string('loggable_type', 191)->nullable(); // Type of the associated resource
            $table->unsignedBigInteger('logger_id')->nullable(); // ID of the logger (user or system)
            $table->string('logger_type', 191)->nullable(); // Type of the logger (e.g., User)
            $table->unsignedBigInteger('error_log_type_id')->nullable(); // ID for the type of error log
            $table->longText('log_trace')->nullable(); // Stack trace of the error
            $table->mediumText('log_headers')->nullable(); // Request headers
            $table->longText('log_message')->nullable(); // Error message
            $table->string('file', 191)->nullable(); // File where the error occurred
            $table->longText('exception_data')->nullable(); // Additional exception data
            $table->longText('log_previous')->nullable(); // Previous error log/message
            $table->longText('link')->nullable(); // Relevant link, if any
            $table->string('full_url', 191)->nullable(); // Full URL of the request
            $table->string('ip', 191)->nullable(); // IP address of the requester
            $table->longText('request_data')->nullable(); // Data from the request
            $table->unsignedBigInteger('created_by')->nullable(); // User who created the log
            $table->unsignedBigInteger('updated_by')->nullable(); // User who last updated the log
            $table->unsignedBigInteger('deleted_by')->nullable(); // User who deleted the log
            $table->softDeletes(); // For soft delete functionality
            $table->timestamps(); // created_at and updated_at timestamps
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('error_logs');
    }
};
