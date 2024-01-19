<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('certificates', function (Blueprint $table) {
            $table->id("certificate_id"); // Auto-incremental primary key
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('user_id')->on('students')->onDelete('cascade');
            $table->unsignedBigInteger('event_id');
            $table->foreign('event_id')->references('event_id')->on('society_events')->onDelete('cascade');
            $table->string('certificate_number')->unique()->nullable(false); // New column for the certificate with unique constraint
            $table->string('certificate_file')->nullable(false); // Assuming it is a string representing the file path or name
            $table->unique(['user_id', 'event_id']);
            $table->timestamps(); // Adds created_at and updated_at columns
        });
        DB::statement('ALTER TABLE certificates AUTO_INCREMENT = 111');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('student_certificates');
    }
};
